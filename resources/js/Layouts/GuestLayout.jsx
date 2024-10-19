import ApplicationLogo from '@/Components/ApplicationLogo';
import {Link} from '@inertiajs/react';
import MainLayout from "@/Layouts/MainLayout.jsx";

export default function Guest({children, title=''}) {
    return (
        <MainLayout title={title}>
            <div className="m-5 flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">

                <div className="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {children}
                </div>
            </div>
        </MainLayout>
    );
}
