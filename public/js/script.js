let counters = document.querySelectorAll('.counter');

$(document).ready(function (){
    AOS.init();

    var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',

        // These options are needed to round to whole numbers if that's what you want.
        //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });

    const nominalText = document.querySelectorAll('.nominal-text');
    nominalText.forEach(function (e) {
        e.innerHTML = formatter.format(e.innerHTML);
    })

    const numericSeparator = document.querySelectorAll('.numeric-separator');
    numericSeparator.forEach(function (e) {
        e.innerHTML = formatRupiah(e.innerHTML);
    })

    const timeAgo = document.querySelectorAll('.time-ago');
    timeAgo.forEach(function (e) {
        var strAgo = 'Just now';

        const today = new Date()
        const endDate = new Date(e.innerHTML);

        // console.log(today);
        // console.log(endDate);

        const seconds = parseInt(Math.abs(today.getTime() - endDate.getTime()) / 1000);
        const minutes = parseInt(seconds / 60);
        const hours = parseInt(minutes / 60);
        const days = parseInt(hours / 24);
        const months = parseInt(days / 30);
        const years = parseInt(months / 12);

        if(years) strAgo = years + ' Year(s) Ago';
        else if(months) strAgo = months + ' Month(s) Ago';
        else if(days) strAgo = days + ' Days(s) Ago';
        else if(hours) strAgo = hours + ' Hour(s) Ago';
        else if(minutes) strAgo = minutes + ' Minute(s) Ago';
        else if(seconds) strAgo = seconds + ' Second(s) Ago';

        e.innerHTML = strAgo;
    });

    //businessList & companyList
    $('#sortBySelect').on('change', function (e){
        setSortBy();
    })

    $('#searchText').on( "keypress", function(event) {
        if (event.which == 13 && !event.shiftKey) {
            event.preventDefault();
            searchQuery();
        }
    });

    setSearchTextComponent();
    setSortByComponent()
    urlCategory();

    var pathname = window.location.pathname;

    if(pathname == "/home" || pathname == "/"){
        changeNav();
    }
});

function changeNav(){
    var scrollStopNumber = $('.homeBanner').height();

    setNavBar2();
    $('.navbar').addClass('fixed-top');
    $('.navbar').removeClass('sticky-top');

    $(window).scroll(function () {
        //if you hard code, then use console
        //.log to determine when you want the
        //nav bar to stick.
        if ($(window).scrollTop() > scrollStopNumber) {
            setNavBar1();
        }
        if ($(window).scrollTop() < scrollStopNumber) {
            setNavBar2();
        }
    });


}

function setNavBar1(){
    var url = window.location.origin;
    $('.navbar').css('background-color','white');
    $('#logoNav').attr('src',url + '/storage/LogoGreen.png');
    $('.navbar-brand').css('color','black');
    $('.nav-link').css('color','black');
}

function setNavBar2(){
    var url = window.location.origin;
    $('.navbar').css('background-color','transparent');

    $('#logoNav').attr('src', url + '/storage/Logo.png');
    $('.navbar-brand').css('color','white');
    $('.nav-link').css('color','white');
}

function formatRupiah(angka, prefix) {
    angka = '' + angka;
    var number_string = angka.replace(/[^\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}

function parseRupiah(angka) {
    if(angka.length != 0) {
        let result = angka.replace(/Rp. /gi, "");
        result = result.replace(/[.]/g, "");
        result = result.replace(/[,]/g, ".");
        // console.log(angka + ' - ' + result);
        return result;
    }

    return 0;
}

function changeImage(input){
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $('#newImage').attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function setSearchTextComponent(){
    const urlParams = new URLSearchParams(window.location.search);
    let search = '';
    if(urlParams.has('search'))
    {
        search = urlParams.get('search');
        $("#searchText").val(decodeURI(search));
    }
}

function setSortByComponent(){
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has('sortBy')) {
        const sortBy = urlParams.get('sortBy');
        $("#sortBySelect option[value='" + sortBy + "']").prop('selected', true);
    }
}

function setSortBy() {
    let url = window.location.href.split("?")[0];
    let params = new URLSearchParams(window.location.search);
    let currentSelect = $('#sortBySelect').find(":selected").val();

    if(params.has('sortBy')) params.set('sortBy', currentSelect);
    else params.append('sortBy', currentSelect);

    window.location = url + "?" + params;
}

function onCheckedCategory(){
    let url = window.location.href.split("?")[0];
    let params = new URLSearchParams(window.location.search);
    let categoryString = '';
    $.each($("input[name='catName']:checked"), function(){
        if(categoryString === '') categoryString += $(this).val();
        else categoryString += '#' + $(this).val();

        console.log(categoryString);
    });

    if(categoryString !== '') {
        if(params.has('category')) params.set('category', encodeURI(categoryString));
        else params.append('category', encodeURI(categoryString));
    } else params.delete('category');

    window.location = url + '?' + params;
}

function urlCategory(){
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has('category')) {
        const catVal = urlParams.get('category')
        const catValSplit = catVal.toString().split("#");

        for(i = 0; i < catValSplit.length; i++) {
            $("#categorySelect input[value=" + catValSplit[i] + "]").attr('checked', true);
        }
    }
}

function searchQuery(){
    let searchText = $('#searchText').val();
    let url = window.location.href.split('?')[0];

    let currParams = new URLSearchParams(window.location.search);

    if(searchText === "") {
        if(currParams.has('businessId') && currParams.has('search')) {
            currParams.delete('search');
            window.location = url + '?' + currParams.toString();
        }
        else window.location = url;
    }
    else {
        if(currParams.has('businessId')) {
            if(currParams.has('search')) currParams.set('search', encodeURI(searchText));
            else currParams.append('search', encodeURI(searchText));
            window.location = url + '?' + currParams.toString();
        } else {
            let params = new URLSearchParams({
                "search": encodeURI(searchText)
            });
            window.location = url + '?' + params.toString();
        }
    }
}

counters.forEach(counter => {
    let dataTarget = counter.getAttribute('data-target');
    let timeOut = 1;
    let speed = 200;
    if(dataTarget < 200) {
        timeOut = ((200 - dataTarget) / 10) + 1;
        speed = dataTarget;
    }

    const updateCount = () => {
        const target = dataTarget;
        const count = +counter.innerText;

        // Lower inc to slow and higher to slow
        const inc = Math.ceil(target / speed);

        // console.log(inc);
        // console.log(count);

        // Check if target is reached
        if (count < target) {
            // Add inc to count and output in counter
            counter.innerText = count + inc;
            // Call function every ms
            setTimeout(updateCount, timeOut);
        } else {
            counter.innerText = target;
        }
    };

    updateCount();
});
