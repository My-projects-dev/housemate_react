import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, usePage} from '@inertiajs/react';
import AnnouncementEditForm from "@/Components/AnnouncementEditForm.jsx";


function AnnouncementEdit({ auth }) {

    const {announcement} = usePage().props;

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                        <AnnouncementEditForm announcement={announcement}/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
export default AnnouncementEdit;
