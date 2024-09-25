import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, usePage} from '@inertiajs/react';
import BootstrapTable from "@/Components/BootstrapTable.jsx";


export default function Dashboard({ auth }) {

    const {trans, announcements} = usePage().props;

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <BootstrapTable data={announcements} trans={trans.frontend}/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
