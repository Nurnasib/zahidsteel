import { Link } from '@inertiajs/react';
import { usePage } from '@inertiajs/react';
import { home } from '@/routes';
import { type PropsWithChildren } from 'react';
import AppLogoIcon from '@/components/app-logo-icon';

interface Setting {
    logo?: string | null;
    site_name?: string | null;
}

interface AuthLayoutProps {
    name?: string;
    title?: string;
    description?: string;
}

export default function AuthSimpleLayout({
                                             children,
                                         }: PropsWithChildren<AuthLayoutProps>) {
    const { setting } = usePage<{ setting: Setting }>().props;

    const logoUrl = setting?.logo
        ? `/${setting.logo}`
        : null;

    return (
        <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
            <div className="w-full max-w-sm">
                <div className="flex flex-col gap-8">
                    <div className="flex flex-col items-center gap-4">
                        <Link
                            href={home()}
                            className="flex flex-col items-center gap-2 font-medium"
                        >
                            <div className="mb-1 flex h-[45px] w-[140px] items-center justify-center rounded-md">
                                {logoUrl ? (
                                    <img
                                        src={logoUrl}
                                        alt={setting?.site_name ?? 'Logo'}
                                        className="size-50 object-contain"
                                    />
                                ) : (
                                    <></>
                                )}
                            </div>
                        </Link>
                    </div>
                    {children}
                </div>
            </div>
        </div>
    );
}
