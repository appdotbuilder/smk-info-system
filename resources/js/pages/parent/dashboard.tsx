import React from 'react';
import { Head, usePage } from '@inertiajs/react';
import { type SharedData } from '@/types';

interface Props extends SharedData {
    stats: {
        total_children: number;
        total_pending_fees: number;
        average_performance: number;
    };
    children: Array<{
        name: string;
        class: string;
        average_grade: number;
        attendance_percentage: number;
        pending_fees: number;
    }>;
    [key: string]: unknown;
}

export default function ParentDashboard({ stats, children }: Props) {
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
            <Head title="Dashboard Orang Tua" />
            <div className="min-h-screen bg-gray-50 p-6 dark:bg-gray-900">
                <div className="mx-auto max-w-7xl">
                    {/* Header */}
                    <div className="mb-8">
                        <div className="flex items-center gap-4">
                            <div className="flex h-16 w-16 items-center justify-center rounded-xl bg-purple-600 text-3xl text-white">
                                👨‍👩‍👧‍👦
                            </div>
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                                    Dashboard Orang Tua
                                </h1>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Selamat datang, {auth.user.name}
                                </p>
                                <p className="text-sm text-blue-600 dark:text-blue-400">
                                    Monitor perkembangan putra/putri Anda
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Stats Grid */}
                    <div className="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Anak</p>
                                    <p className="text-3xl font-bold text-blue-600">{stats.total_children}</p>
                                    <p className="text-sm text-green-600">👨‍👩‍👧‍👦 Siswa aktif</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-blue-100 text-2xl dark:bg-blue-900">
                                    👥
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Tagihan Pending</p>
                                    <p className="text-lg font-bold text-red-600">{formatCurrency(stats.total_pending_fees)}</p>
                                    <p className="text-sm text-red-600">💳 Total tunggakan</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-red-100 text-2xl dark:bg-red-900">
                                    💳
                                </div>
                            </div>
                        </div>

                        <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Rata-rata Prestasi</p>
                                    <p className="text-3xl font-bold text-green-600">{stats.average_performance.toFixed(1)}</p>
                                    <p className="text-sm text-green-600">📊 Nilai akademik</p>
                                </div>
                                <div className="flex h-14 w-14 items-center justify-center rounded-lg bg-green-100 text-2xl dark:bg-green-900">
                                    📊
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
                                    <p className="font-medium text-gray-900 dark:text-white">Lihat Rapor</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">E-Rapor digital</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                    💳
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Bayar Tagihan</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Payment online</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-lg dark:bg-purple-900">
                                    ✅
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Riwayat Absensi</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Kehadiran anak</p>
                                </div>
                            </button>
                            
                            <button className="flex items-center gap-3 rounded-lg bg-white p-4 text-left shadow-sm hover:shadow-md dark:bg-gray-800">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-100 text-lg dark:bg-orange-900">
                                    💬
                                </div>
                                <div>
                                    <p className="font-medium text-gray-900 dark:text-white">Komunikasi</p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Chat dengan guru</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    {/* Children Progress */}
                    <div className="mb-8">
                        <h2 className="mb-6 text-2xl font-bold text-gray-900 dark:text-white">👨‍👩‍👧‍👦 Perkembangan Anak</h2>
                        <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            {children.map((child, index) => (
                                <div key={index} className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                                    <div className="mb-4 flex items-center gap-3">
                                        <div className="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-2xl dark:bg-blue-900">
                                            🎓
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">{child.name}</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">{child.class}</p>
                                        </div>
                                    </div>
                                    
                                    <div className="space-y-3">
                                        <div className="flex items-center justify-between">
                                            <span className="text-sm text-gray-600 dark:text-gray-400">Rata-rata Nilai</span>
                                            <span className="font-semibold text-green-600">{child.average_grade}</span>
                                        </div>
                                        
                                        <div className="flex items-center justify-between">
                                            <span className="text-sm text-gray-600 dark:text-gray-400">Kehadiran</span>
                                            <span className="font-semibold text-blue-600">{child.attendance_percentage}%</span>
                                        </div>
                                        
                                        <div className="flex items-center justify-between">
                                            <span className="text-sm text-gray-600 dark:text-gray-400">Tagihan Pending</span>
                                            <span className={`font-semibold ${child.pending_fees > 0 ? 'text-red-600' : 'text-green-600'}`}>
                                                {child.pending_fees > 0 ? formatCurrency(child.pending_fees) : 'Lunas'}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    {child.pending_fees > 0 && (
                                        <button className="mt-4 w-full rounded-lg bg-blue-600 py-2 text-white hover:bg-blue-700">
                                            Bayar Sekarang
                                        </button>
                                    )}
                                </div>
                            ))}
                        </div>
                    </div>

                    {/* Recent Notifications */}
                    <div className="rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                        <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">🔔 Notifikasi Terbaru</h2>
                        <div className="space-y-4">
                            <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-lg dark:bg-blue-900">
                                    📊
                                </div>
                                <div className="flex-1">
                                    <p className="text-gray-900 dark:text-white">Rapor semester telah tersedia untuk diunduh</p>
                                    <p className="text-sm text-gray-500 dark:text-gray-400">2 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start gap-4 border-b border-gray-200 pb-4 dark:border-gray-700">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-lg dark:bg-red-900">
                                    💳
                                </div>
                                <div className="flex-1">
                                    <p className="text-gray-900 dark:text-white">Reminder: SPP bulan November jatuh tempo 25 November</p>
                                    <p className="text-sm text-gray-500 dark:text-gray-400">1 hari yang lalu</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start gap-4">
                                <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-lg dark:bg-green-900">
                                    🏆
                                </div>
                                <div className="flex-1">
                                    <p className="text-gray-900 dark:text-white">Selamat! Anak Anda meraih peringkat 3 di kelas</p>
                                    <p className="text-sm text-gray-500 dark:text-gray-400">3 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}