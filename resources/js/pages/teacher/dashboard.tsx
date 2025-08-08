import React from 'react';
import { Head, usePage } from '@inertiajs/react';
import { type SharedData } from '@/types';

interface Props extends SharedData {
    stats: {
        total_classes: number;
        total_students: number;
        pending_assignments: number;
        homeroom_class: {
            id: number;
            name: string;
        } | null;
    };
    upcomingSchedules: Array<{
        day: string;
        time: string;
        subject: string;
        class: string;
    }>;
    currentAcademicYear: {
        id: number;
        name: string;
        start_date: string;
        end_date: string;
        is_active: boolean;
    } | null;
    [key: string]: unknown;
}

export default function TeacherDashboard({ stats, currentAcademicYear }: Props) {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Dashboard Guru" />
            <div className="min-h-screen bg-gray-50 p-6 dark:bg-gray-900">
                <div className="mx-auto max-w-7xl">
                    {/* Header */}
                    <div className="mb-8">
                        <div className="flex items-center gap-4">
                            <div className="flex h-16 w-16 items-center justify-center rounded-xl bg-green-600 text-3xl text-white">
                                👨‍🏫
                            </div>
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                                    Dashboard Guru
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
                    <div className="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Kelas Mengajar</p>
                                    <p className="text-3xl font-bold text-blue-600">{stats.total_classes}</p>
                                    <p className="text-sm text-green-600">🏛️ Kelas aktif</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-blue-100 text-2xl dark:bg-blue-900">
                                    🏛️
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Siswa</p>
                                    <p className="text-3xl font-bold text-green-600">{stats.total_students}</p>
                                    <p className="text-sm text-green-600">👥 Siswa diampu</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-green-100 text-2xl dark:bg-green-900">
                                    👥
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Tugas Pending</p>
                                    <p className="text-3xl font-bold text-orange-600">{stats.pending_assignments}</p>
                                    <p className="text-sm text-orange-600">📝 Perlu diperiksa</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-orange-100 text-2xl dark:bg-orange-900">
                                    📝
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Wali Kelas</p>
                                    <p className="text-lg font-bold text-purple-600">
                                        {stats.homeroom_class ? stats.homeroom_class.name : 'Tidak Ada'}
                                    </p>
                                    <p className="text-sm text-purple-600">🏠 Kelas binaan</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-purple-100 text-2xl dark:bg-purple-900">
                                    🏠
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
                                    ✅
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Absensi Siswa</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Input kehadiran</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                    📊
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Input Nilai</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Tambah nilai siswa</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                    📚
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Upload Materi</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Bagikan materi</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-100 text-lg dark:bg-orange-900">
                                    📝
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Buat Tugas</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Tugas baru</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div className="grid gap-8 lg:grid-cols-2">
                        {/* Today's Schedule */}
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">📅 Jadwal Hari Ini</h2>
                            <div className="space-y-4">
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                        🕐
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Matematika</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">X TKJ 1 • 08:00 - 09:30</p>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                        🕐
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Bahasa Indonesia</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">XI TKJ 2 • 10:00 - 11:30</p>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                        🕐
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Praktikum Jaringan</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">XII TKJ 1 • 13:00 - 15:00</p>
                                    </div>
                                </div>
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
                                        <p className="text-gray-900 dark:text-white">Absensi X TKJ 1 telah diinput</p>
                                        <p className="text-sm text-gray-500 dark:text-gray-400">1 jam yang lalu</p>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                        📊
                                    </div>
                                    <div className="flex-1">
                                        <p className="text-gray-900 dark:text-white">Nilai ulangan harian telah diinput</p>
                                        <p className="text-sm text-gray-500 dark:text-gray-400">2 jam yang lalu</p>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                        📚
                                    </div>
                                    <div className="flex-1">
                                        <p className="text-gray-900 dark:text-white">Materi "Konsep OOP" telah diupload</p>
                                        <p className="text-sm text-gray-500 dark:text-gray-400">3 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}