import React from 'react';
import { Head, usePage } from '@inertiajs/react';
import { type SharedData } from '@/types';

interface Props extends SharedData {
    stats: {
        current_class: string;
        total_subjects: number;
        average_grade: number;
        attendance_percentage: number;
    };
    upcomingAssignments: Array<{
        title: string;
        subject: string;
        due_date: string;
        status: string;
    }>;
    recentGrades: Array<{
        subject: string;
        title: string;
        score: number;
        date: string;
    }>;
    [key: string]: unknown;
}

export default function StudentDashboard({ stats }: Props) {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Dashboard Siswa" />
            <div className="min-h-screen bg-gray-50 p-6 dark:bg-gray-900">
                <div className="mx-auto max-w-7xl">
                    {/* Header */}
                    <div className="mb-8">
                        <div className="flex items-center gap-4">
                            <div className="flex h-16 w-16 items-center justify-center rounded-xl bg-blue-600 text-3xl text-white">
                                🎓
                            </div>
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                                    Dashboard Siswa
                                </h1>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Selamat datang, {auth.user.name}
                                </p>
                                <p className="text-sm text-blue-600 dark:text-blue-400">
                                    Kelas: {stats.current_class}
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Stats Grid */}
                    <div className="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Kelas</p>
                                    <p className="text-2xl font-bold text-blue-600">{stats.current_class}</p>
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
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Mata Pelajaran</p>
                                    <p className="text-3xl font-bold text-green-600">{stats.total_subjects}</p>
                                    <p className="text-sm text-green-600">📚 Total mapel</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-green-100 text-2xl dark:bg-green-900">
                                    📚
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Rata-rata Nilai</p>
                                    <p className="text-3xl font-bold text-purple-600">{stats.average_grade}</p>
                                    <p className="text-sm text-purple-600">📊 Prestasi</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-purple-100 text-2xl dark:bg-purple-900">
                                    📊
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Kehadiran</p>
                                    <p className="text-2xl font-bold text-orange-600">{stats.attendance_percentage}%</p>
                                    <p className="text-sm text-orange-600">✅ Absensi</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-orange-100 text-2xl dark:bg-orange-900">
                                    ✅
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
                                    📅
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Jadwal Pelajaran</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Lihat jadwal</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                    📊
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Lihat Nilai</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Riwayat nilai</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                    📚
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Materi Pelajaran</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Download materi</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-100 text-lg dark:bg-orange-900">
                                    📝
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Tugas & Kuis</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Kumpul tugas</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div className="grid gap-8 lg:grid-cols-2">
                        {/* Upcoming Assignments */}
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">📝 Tugas Mendatang</h2>
                            <div className="space-y-4">
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-lg dark:bg-red-900">
                                        ⏰
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Essay Sejarah Indonesia</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">Sejarah • Deadline: 25 Nov 2024</p>
                                        <span className="inline-block rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-200">
                                            Urgent
                                        </span>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-100 text-lg dark:bg-yellow-900">
                                        ⏰
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Praktikum Jaringan</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">TKJ • Deadline: 28 Nov 2024</p>
                                        <span className="inline-block rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                            Segera
                                        </span>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                        ⏰
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Project Web Development</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">Pemrograman Web • Deadline: 5 Des 2024</p>
                                        <span className="inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                                            Normal
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Recent Grades */}
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">📊 Nilai Terbaru</h2>
                            <div className="space-y-4">
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                        📊
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Ulangan Harian Matematika</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">20 Nov 2024</p>
                                        <span className="inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                                            88
                                        </span>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                        📊
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Quiz Bahasa Inggris</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">18 Nov 2024</p>
                                        <span className="inline-block rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            92
                                        </span>
                                    </div>
                                </div>
                                
                                <div className="flex items-start gap-4">
                                    <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                        📊
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-medium text-gray-900 dark:text-white">Praktikum Database</p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">15 Nov 2024</p>
                                        <span className="inline-block rounded-full bg-purple-100 px-2 py-1 text-xs font-medium text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                            85
                                        </span>
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