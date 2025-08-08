import React from 'react';
import { Head, usePage } from '@inertiajs/react';
import { type SharedData } from '@/types';

interface Props extends SharedData {
    stats: {
        total_students: number;
        total_teachers: number;
        total_parents: number;
        total_classes: number;
        pending_registrations: number;
        monthly_revenue: number;
    };
    currentAcademicYear: {
        id: number;
        name: string;
        start_date: string;
        end_date: string;
        is_active: boolean;
    } | null;
    [key: string]: unknown;
}

export default function AdminDashboard({ stats, currentAcademicYear }: Props) {
    const { auth } = usePage<SharedData>().props;

    const formatCurrency = (amount: number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(amount);
    };

    return (
        <>
            <Head title="Dashboard Administrator" />
            <div className="min-h-screen bg-gray-50 p-6 dark:bg-gray-900">
                <div className="mx-auto max-w-7xl">
                    {/* Header */}
                    <div className="mb-8">
                        <div className="flex items-center gap-4">
                            <div className="flex h-16 w-16 items-center justify-center rounded-xl bg-blue-600 text-3xl text-white">
                                👑
                            </div>
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                                    Dashboard Administrator
                                </h1>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Selamat datang, {auth.user.name}
                                </p>
                                {currentAcademicYear && (
                                    <p className="text-sm text-blue-600 dark:text-blue-400">
                                        Tahun Ajaran: {currentAcademicYear.name}
                                    </p>
                                )}
                            </div>
                        </div>
                    </div>

                    {/* Stats Grid */}
                    <div className="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Siswa</p>
                                    <p className="text-3xl font-bold text-blue-600">{stats.total_students}</p>
                                    <p className="text-sm text-green-600">📈 Aktif</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-blue-100 text-2xl dark:bg-blue-900">
                                    👥
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Guru</p>
                                    <p className="text-3xl font-bold text-green-600">{stats.total_teachers}</p>
                                    <p className="text-sm text-green-600">👨‍🏫 Pengajar aktif</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-green-100 text-2xl dark:bg-green-900">
                                    👨‍🏫
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Orang Tua</p>
                                    <p className="text-3xl font-bold text-purple-600">{stats.total_parents}</p>
                                    <p className="text-sm text-green-600">👨‍👩‍👧‍👦 Terdaftar</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-purple-100 text-2xl dark:bg-purple-900">
                                    👨‍👩‍👧‍👦
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Kelas</p>
                                    <p className="text-3xl font-bold text-orange-600">{stats.total_classes}</p>
                                    <p className="text-sm text-blue-600">🏛️ Ruang belajar</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-orange-100 text-2xl dark:bg-orange-900">
                                    🏛️
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">PPDB Pending</p>
                                    <p className="text-3xl font-bold text-yellow-600">{stats.pending_registrations}</p>
                                    <p className="text-sm text-yellow-600">⏳ Menunggu verifikasi</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-yellow-100 text-2xl dark:bg-yellow-900">
                                    📝
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Pendapatan Bulan Ini</p>
                                    <p className="text-xl font-bold text-green-600">{formatCurrency(stats.monthly_revenue)}</p>
                                    <p className="text-sm text-green-600">💰 Total pembayaran</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-green-100 text-2xl dark:bg-green-900">
                                    💳
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Quick Actions */}
                    <div className="mb-8">
                        <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">⚡ Aksi Cepat</h2>
                        <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                    📊
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Laporan Akademik</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Generate laporan</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                    👨‍🏫
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Manajemen Guru</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Kelola data guru</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                    💰
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Sistem Keuangan</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Kelola pembayaran</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-100 text-lg dark:bg-orange-900">
                                    📝
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">PPDB Online</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Kelola pendaftaran</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    {/* Recent Activities */}
                    <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                        <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">📋 Aktivitas Terkini</h2>
                        <div className="space-y-4">
                            <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                    ✅
                                </div>
                                <div className="flex-1">
                                    <p className="text-gray-900 dark:text-white">12 pendaftar PPDB baru telah diverifikasi</p>
                                    <p className="text-sm text-gray-500 dark:text-gray-400">2 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                    💳
                                </div>
                                <div className="flex-1">
                                    <p className="text-gray-900 dark:text-white">Pembayaran SPP bulan ini: Rp 125.000.000</p>
                                    <p className="text-sm text-gray-500 dark:text-gray-400">4 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start gap-4">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                    📊
                                </div>
                                <div className="flex-1">
                                    <p className="text-gray-900 dark:text-white">Laporan absensi semester telah di-generate</p>
                                    <p className="text-sm text-gray-500 dark:text-gray-400">1 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}