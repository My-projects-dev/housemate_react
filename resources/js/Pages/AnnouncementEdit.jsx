import {usePage} from '@inertiajs/react';
import AnnouncementEditForm from "@/Components/AnnouncementEditForm.jsx";
import MainLayout from "@/Layouts/MainLayout.jsx";


function AnnouncementEdit({ auth }) {

    const {announcement, trans} = usePage().props;

    return (
        <MainLayout title={trans.frontend.my_announcements || 'My announcements '}>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                        <AnnouncementEditForm announcement={announcement}/>
                    </div>
                </div>
            </div>
        </MainLayout>

    );
}
export default AnnouncementEdit;
