import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import DeleteUserForm from './Partials/DeleteUserForm';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';
import {Head, usePage} from '@inertiajs/react';
import MainLayout from "@/Layouts/MainLayout.jsx";

export default function Edit({ auth, mustVerifyEmail, status }) {
    const {trans} = usePage().props;

    return (
        <MainLayout title={trans.frontend.profile || 'Profile'}>

        <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdateProfileInformationForm
                            mustVerifyEmail={mustVerifyEmail}
                            status={status}
                            lang = {trans.frontend}
                            className="max-w-xl"
                        />
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdatePasswordForm lang = {trans.frontend} className="max-w-xl" />
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <DeleteUserForm lang = {trans.frontend} className="max-w-xl" />
                    </div>
                </div>
            </div>
        </MainLayout>

    );
}
