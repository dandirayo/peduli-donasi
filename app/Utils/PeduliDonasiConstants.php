<?php

namespace App\Utils;

class PeduliDonasiConstants
{
    public const USER_TIDAK_DITEMUKAN = 'User tidak ditemukan!';
    public const YAYASAN_TIDAK_DITEMUKAN = 'Yayasan tidak ditemukan!';
    public const PROGRAM_YAYASAN_TIDAK_DITEMUKAN = 'Program Yayasan tidak ditemukan!';
    public const ACTIVITY_YAYASAN_TIDAK_DITEMUKAN = 'Aktivitas Yayasan tidak ditemukan!';
    public const APPROVAL_YAYASAN_TIDAK_DITEMUKAN = 'Approval Yayasan tidak ditemukan!';

    public const LOGIN_DAHULU = 'Kamu harus login terlebih dahulu!';

    public const DONASI_TIDAK_DITEMUKAN = 'Donasi tidak ditemukan!';
    public const DONASI_BUKAN_MILIKMU = 'Maaf data donasi tersebut bukan milikmu!';
    public const DONASI_BERHASIL = 'Donasi berhasil, harap segera melakukan pengisian ressi!';
    public const DONASI_GAGAL = 'Donasi gagal, terjadi kesalahan!';
    public const DONASI_GAGAL_INSERT_DATA_DONASI = 'Donasi gagal, terjadi kesalahan saat menginsert data';
    public const DONASI_STATUS_MENUNGGU_RESSI = 'Menunggu Ressi';
    public const DONASI_STATUS_MENUNGGU_PICKUP = 'Menunggu Pickup';
    public const DONASI_STATUS_SEDANG_DALAM_PENGIRIMAN = 'Sedang Dalam Pengiriman';
    public const DONASI_STATUS_SEDANG_DIKIRIM_KURIR = 'Sedang Dikirim oleh Kurir';
    public const DONASI_STATUS_SAMPAI_TUJUAN = 'Sudah Sampai Tujuan';
    public const STATUS_PENGIRIMAN_SELESAI = 'Pengiriman Selesai';
    public const DONASI_STATUS_SELESAI = 'Donasi Selesai';
    public const DONASI_STATUS_UPDATE_BERHASIL = 'Berhasil update status donasi!';
    public const DONASI_INPUT_RESI_BERHASIL = 'Berhasil menginput resi!';
    public const DONASI_INPUT_RESI_GAGAL = 'Gagal menginput resi!';

    public const FORUM_INPUT_BERHASIL = 'Berhasil membuat diskusi baru!';
    public const FORUM_INPUT_GAGAL = 'Gagal membuat diskusi baru!';
    public const FORUM_INPUT_GAGAL_INSERT = 'Gagal membuat diskusi baru, terjadi kesalahan saat menginsert data!';
    public const FORUM_DETAIL_INPUT_BERHASIL = 'Berhasil membuat komentar baru!';
    public const FORUM_DETAIL_INPUT_GAGAL = 'Gagal membuat komentar baru!';
    public const FORUM_DETAIL_INPUT_GAGAL_INSERT = 'Gagal membuat komentar baru, terjadi kesalahan saat menginsert data!';

    public const PROFILE_DONATUR_UPDATE_BERHASIL = 'Berhasil update profile!';
    public const PROFILE_DONATUR_UPDATE_GAGAL = 'Gagal update profile!';
    public const PROFILE_DONATUR_UPDATE_GAGAL_EMAIL_USED = 'Gagal update profile, email sudah digunakan!';
    public const PROFILE_DONATUR_UPDATE_GAGAL_INSERT = 'Gagal update profile, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_UPDATE_BERHASIL = 'Berhasil update yayasan';
    public const PROFILE_YAYASAN_UPDATE_GAGAL = 'Gagal update yayasan';
    public const PROFILE_YAYASAN_UPDATE_GAGAL_INSERT = 'Gagal update yayasan, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_PROGRAM_STORE_BERHASIL = 'Berhasil menambahkan program yayasan';
    public const PROFILE_YAYASAN_PROGRAM_STORE_GAGAL = 'Gagal menambahkan program yayasan';
    public const PROFILE_YAYASAN_PROGRAM_STORE_GAGAL_INSERT = 'Gagal menambahkan program yayasan, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_PROGRAM_UPDATE_BERHASIL = 'Berhasil update program yayasan';
    public const PROFILE_YAYASAN_PROGRAM_UPDATE_GAGAL = 'Gagal update program yayasan';
    public const PROFILE_YAYASAN_PROGRAM_UPDATE_GAGAL_INSERT = 'Gagal update program yayasan, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_PROGRAM_DELETE_BERHASIL = 'Berhasil hapus program yayasan';
    public const PROFILE_YAYASAN_PROGRAM_DELETE_GAGAL = 'Gagal hapus program yayasan';
    public const PROFILE_YAYASAN_PROGRAM_DELETE_GAGAL_DELETE = 'Gagal hapus program yayasan, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_ACTIVITY_STORE_BERHASIL = 'Berhasil menambahkan aktivitas yayasan';
    public const PROFILE_YAYASAN_ACTIVITY_STORE_GAGAL = 'Gagal menambahkan aktivitas yayasan';
    public const PROFILE_YAYASAN_ACTIVITY_STORE_GAGAL_INSERT = 'Gagal menambahkan aktivitas yayasan, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_ACTIVITY_UPDATE_BERHASIL = 'Berhasil update aktivitas yayasan';
    public const PROFILE_YAYASAN_ACTIVITY_UPDATE_GAGAL = 'Gagal update aktivitas yayasan';
    public const PROFILE_YAYASAN_ACTIVITY_UPDATE_GAGAL_INSERT = 'Gagal update aktivitas yayasan, terjadi kesalahan saat menginstert data!';

    public const PROFILE_YAYASAN_ACTIVITY_DELETE_BERHASIL = 'Berhasil hapus aktivitias yayasan';
    public const PROFILE_YAYASAN_ACTIVITY_DELETE_GAGAL = 'Gagal hapus aktivitias yayasan';
    public const PROFILE_YAYASAN_ACTIVITY_DELETE_GAGAL_DELETE = 'Gagal hapus aktivitias yayasan, terjadi kesalahan saat menginstert data!';

    public const YAYASAN_DAFTAR_BERHASIL = 'Berhasil mendaftar yayasan, mohon tunggu admin untuk memproses yayasan anda!';
    public const YAYASAN_DAFTAR_GAGAL = 'Gagal mendaftarkan yayasan!';
    public const YAYASAN_DAFTAR_GAGAL_EXIST = 'Gagal mendaftarkan yayasan, kamu sudah memiliki yayasan yang terdaftar!';
    public const YAYASAN_DAFTAR_GAGAL_EXIST_APPROVAL = 'Gagal mendaftarkan yayasan, kamu sudah memiliki request yayasan yang terdaftar!';
    public const YAYASAN_DAFTAR_GAGAL_INSERT = 'Gagal mendaftarkan yayasan, terjadi kesalahan saat menginsert data!';


    public const APPROVAL_YAYASAN_BERHASIL = 'Berhasil menyetujui yayasan!';
    public const APPROVAL_YAYASAN_GAGAL = 'Gagal menyetujui yayasan!';
    public const APPROVAL_YAYASAN_GAGAL_INSERT = 'Gagal menyetujui yayasan!, terjadi kesalahan saat menginsert data!';
    public const APPROVAL_YAYASAN_GAGAL_NOT_NEW = 'Gagal menyetujui yayasan!, approval tidak berstatus new';
}
