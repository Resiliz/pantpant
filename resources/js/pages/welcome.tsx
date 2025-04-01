import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Card } from '@/components/ui/card';
import { ArrowRight, Recycle, Trophy, Users2 } from 'lucide-react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Welcome to PantPant.se">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
            </Head>

            <div className="min-h-screen bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-950">
                <header className="fixed top-0 left-0 right-0 z-50 border-b bg-white/80 backdrop-blur-sm dark:border-gray-800 dark:bg-gray-950/80">
                    <div className="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                        <Link href="/" className="text-xl font-bold text-gray-900 dark:text-white">
                            PantPant
                        </Link>
                        <nav className="flex items-center gap-4">
                            {auth.user ? (
                                <Button asChild variant="default">
                                    <Link href={route('dashboard')}>Dashboard</Link>
                                </Button>
                            ) : (
                                <>
                                    <Button asChild variant="ghost">
                                        <Link href={route('login')}>Log in</Link>
                                    </Button>
                                    <Button asChild>
                                        <Link href={route('register')}>Get Started</Link>
                                    </Button>
                                </>
                            )}
                        </nav>
                    </div>
                </header>

                <main className="relative">
                    <section className="relative isolate px-6 pt-28 lg:px-8">
                        <div className="mx-auto max-w-4xl py-32 sm:py-48 text-center">
                            <h1 className="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl dark:text-white">
                                Empowering Communities Through Recycling
                            </h1>
                            <p className="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                                Join Swedish sports clubs in making recycling rewarding. Track collections, earn points,
                                and make a difference in your community.
                            </p>
                            <div className="mt-10 flex justify-center gap-x-6">
                                <Button asChild size="lg">
                                    <Link href={route('register')}>
                                        Get Started
                                        <ArrowRight className="ml-2 h-4 w-4" />
                                    </Link>
                                </Button>
                            </div>
                        </div>
                    </section>

                    <section className="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8">
                        <div className="mx-auto max-w-2xl lg:text-center">
                            <h2 className="text-base font-semibold leading-7 text-blue-600 dark:text-blue-400">
                                Why PantPant?
                            </h2>
                            <p className="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                                Everything you need to manage recycling
                            </p>
                        </div>
                        <div className="mt-16 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            <Card className="p-6 dark:bg-gray-900">
                                <Users2 className="h-8 w-8 text-blue-600 dark:text-blue-400" />
                                <h3 className="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Community Driven</h3>
                                <p className="mt-2 text-gray-600 dark:text-gray-300">
                                    Connect sports clubs with households and sponsors for efficient recycling management.
                                </p>
                            </Card>
                            <Card className="p-6 dark:bg-gray-900">
                                <Recycle className="h-8 w-8 text-blue-600 dark:text-blue-400" />
                                <h3 className="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Smart Collection</h3>
                                <p className="mt-2 text-gray-600 dark:text-gray-300">
                                    Optimize routes and track collections in real-time with our intelligent system.
                                </p>
                            </Card>
                            <Card className="p-6 dark:bg-gray-900">
                                <Trophy className="h-8 w-8 text-blue-600 dark:text-blue-400" />
                                <h3 className="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Gamification</h3>
                                <p className="mt-2 text-gray-600 dark:text-gray-300">
                                    Earn points, badges, and compete on leaderboards while making a positive impact.
                                </p>
                            </Card>
                        </div>
                    </section>

                    <section className="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8">
                        <div className="relative isolate overflow-hidden bg-gray-900 px-6 py-24 text-center shadow-2xl sm:rounded-3xl sm:px-16">
                            <h2 className="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-4xl">
                                Start recycling with your community today
                            </h2>
                            <p className="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-300">
                                Join thousands of users making a difference in their communities through organized recycling.
                            </p>
                            <div className="mt-10 flex justify-center gap-x-6">
                                <Button asChild size="lg" variant="secondary">
                                    <Link href={route('register')}>
                                        Create your account
                                        <ArrowRight className="ml-2 h-4 w-4" />
                                    </Link>
                                </Button>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </>
    );
}
