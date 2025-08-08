import React from 'react';
import { Head, Link, usePage } from '@inertiajs/react';
import { type SharedData } from '@/types';

interface Props extends SharedData {
    stats: {
        total_students: number;
        total_teachers: number;
        total_classes: number;
        total_subjects: number;
    };
    currentAcademicYear: {
        id: number;
        name: string;
        start_date: string;
        end_date: string;
        is_active: boolean;
    } | null;
    recentActivities: Array<{
        type: string;
        message: string;
        time: string;
        icon: string;
    }>;
    [key: string]: unknown;
}

export default function SchoolDashboard({ stats, currentAcademicYear, recentActivities }: Props) {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Sistem Informasi Sekolah SMK">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-gray-800 dark:from-gray-900 dark:to-gray-800 dark:text-gray-100">
                <header className="mb-8 w-full">
                    <nav className="flex items-center justify-between">
                        <div className="flex items-center gap-3">
                            <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-2xl text-white">
                                🏫
                            </div>
                            <div>
                                <h1 className="text-2xl font-bold text-blue-900 dark:text-blue-100">SMK Digital</h1>
                                <p className="text-sm text-blue-700 dark:text-blue-300">Sistem Informasi Sekolah</p>
                            </div>
                        </div>
                        {auth.user ? (
                            <div className="flex items-center gap-4">
                                <span className="text-sm text-gray-600 dark:text-gray-300">
                                    Halo, {auth.user.name}
                                </span>
                                <Link
                                    href={route('dashboard')}
                                    className="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                                >
                                    Dashboard
                                </Link>
                            </div>
                        ) : (
                            <div className="flex items-center gap-4">
                                <Link
                                    href={route('login')}
                                    className="rounded-lg border border-blue-600 px-4 py-2 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900"
                                >
                                    Masuk
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                                >
                                    Daftar
                                </Link>
                            </div>
                        )}
                    </nav>
                </header>

                <main className="mx-auto w-full max-w-7xl flex-1">
                    {/* Hero Section */}
                    <div className="mb-12 text-center">
                        <h2 className="mb-4 text-4xl font-bold text-blue-900 dark:text-blue-100">
                            🎓 Sistem Informasi Sekolah Komprehensif
                        </h2>
                        <p className="mx-auto max-w-3xl text-lg text-gray-700 dark:text-gray-300">
                            Platform terpadu untuk mengelola administrasi sekolah, proses belajar mengajar, 
                            dan komunikasi antara administrator, guru, siswa, dan orang tua/wali.
                        </p>
                        {currentAcademicYear && (
                            <div className="mt-4 inline-flex items-center rounded-full bg-green-100 px-4 py-2 text-sm font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                                📅 Tahun Ajaran Aktif: {currentAcademicYear.name}
                            </div>
                        )}
                    </div>

                    {/* Stats Grid */}
                    <div className="mb-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Siswa</p>
                                    <p className="text-2xl font-bold text-blue-600">{stats.total_students}</p>
                                </div>
                                <div className="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-2xl dark:bg-blue-900">
                                    👥
                                </div>
                            </div>
                        </div>
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Guru</p>
                                    <p className="text-2xl font-bold text-green-600">{stats.total_teachers}</p>
                                </div>
                                <div className="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 text-2xl dark:bg-green-900">
                                    👨‍🏫
                                </div>
                            </div>
                        </div>
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Kelas</p>
                                    <p className="text-2xl font-bold text-purple-600">{stats.total_classes}</p>
                                </div>
                                <div className="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100 text-2xl dark:bg-purple-900">
                                    🏛️
                                </div>
                            </div>
                        </div>
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Mata Pelajaran</p>
                                    <p className="text-2xl font-bold text-orange-600">{stats.total_subjects}</p>
                                </div>
                                <div className="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-100 text-2xl dark:bg-orange-900">
                                    📚
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Features Grid */}
                    <div className="mb-12">
                        <h3 className="mb-8 text-center text-3xl font-bold text-gray-900 dark:text-white">
                            🚀 Fitur Unggulan Sistem
                        </h3>
                        <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                            <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                                <div className="mb-4 text-4xl">👑</div>
                                <h4 className="mb-2 text-xl font-semibold">Portal Administrator</h4>
                                <ul className="text-sm text-gray-600 dark:text-gray-400">
                                    <li>• Manajemen data master akademik</li>
                                    <li>• Sistem keuangan terintegrasi</li>
                                    <li>• PPDB online</li>
                                    <li>• Laporan komprehensif</li>
                                </ul>
                            </div>
                            <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                                <div className="mb-4 text-4xl">👨‍🏫</div>
                                <h4 className="mb-2 text-xl font-semibold">Portal Guru</h4>
                                <ul className="text-sm text-gray-600 dark:text-gray-400">
                                    <li>• Manajemen absensi siswa</li>
                                    <li>• Input nilai & e-Rapor</li>
                                    <li>• Mini-LMS untuk materi</li>
                                    <li>• Komunikasi dengan siswa</li>
                                </ul>
                            </div>
                            <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                                <div className="mb-4 text-4xl">🎓</div>
                                <h4 className="mb-2 text-xl font-semibold">Portal Siswa</h4>
                                <ul className="text-sm text-gray-600 dark:text-gray-400">
                                    <li>• Jadwal pelajaran online</li>
                                    <li>• Riwayat nilai & rapor digital</li>
                                    <li>• Download materi pelajaran</li>
                                    <li>• Notifikasi akademik</li>
                                </ul>
                            </div>
                            <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                                <div className="mb-4 text-4xl">👨‍👩‍👧‍👦</div>
                                <h4 className="mb-2 text-xl font-semibold">Portal Orang Tua</h4>
                                <ul className="text-sm text-gray-600 dark:text-gray-400">
                                    <li>• Monitor perkembangan anak</li>
                                    <li>• Rincian tagihan & pembayaran</li>
                                    <li>• Komunikasi dengan sekolah</li>
                                    <li>• Payment gateway terintegrasi</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {/* Recent Activities */}
                    <div className="mb-12">
                        <h3 className="mb-6 text-2xl font-bold text-gray-900 dark:text-white">
                            📋 Aktivitas Terkini
                        </h3>
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="space-y-4">
                                {recentActivities.map((activity, index) => (
                                    <div key={index} className="flex items-start gap-4 border-b border-gray-200 pb-4 last:border-b-0 dark:border-gray-700">
                                        <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                            {activity.icon}
                                        </div>
                                        <div className="flex-1">
                                            <p className="text-gray-900 dark:text-white">{activity.message}</p>
                                            <p className="text-sm text-gray-500 dark:text-gray-400">{activity.time}</p>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>

                    {/* Call to Action */}
                    <div className="text-center">
                        <div className="rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 p-8 text-white">
                            <h3 className="mb-4 text-2xl font-bold">💫 Bergabunglah dengan Revolusi Digital Pendidikan</h3>
                            <p className="mb-6 text-lg opacity-90">
                                Tingkatkan efisiensi operasional, transparansi informasi, dan kualitas komunikasi di sekolah Anda
                            </p>
                            {!auth.user && (
                                <div className="flex justify-center gap-4">
                                    <Link
                                        href={route('login')}
                                        className="rounded-lg bg-white px-6 py-3 font-semibold text-blue-600 hover:bg-gray-100"
                                    >
                                        Masuk Sekarang
                                    </Link>
                                    <Link
                                        href={route('register')}
                                        className="rounded-lg border-2 border-white px-6 py-3 font-semibold text-white hover:bg-white hover:text-blue-600"
                                    >
                                        Daftar Gratis
                                    </Link>
                                </div>
                            )}
                        </div>
                    </div>
                </main>

                <footer className="mt-12 text-center text-sm text-gray-500 dark:text-gray-400">
                    <p>© 2024 SMK Digital - Sistem Informasi Sekolah. Dibuat dengan ❤️ untuk pendidikan Indonesia.</p>
                </footer>
            </div>
        </>
    );
}