import { Head, Link, usePage } from '@inertiajs/react';
import { login, register } from '@/routes';

export default function Welcome({
                                    canRegister = true,
                                }: {
    canRegister?: boolean;
}) {
    const { auth } = usePage().props;

    return (
        <>
            <Head title="Welcome" />
            <div className="...">
                <header>
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link href="/admin/dashboard" className="...">
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link href={login.url()} className="...">
                                    Log in
                                </Link>
                                {canRegister && (
                                    <Link href={register.url()} className="...">
                                        Register
                                    </Link>
                                )}
                            </>
                        )}
                    </nav>
                </header>
            </div>
        </>
    );
}
