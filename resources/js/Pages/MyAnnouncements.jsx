import React from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import {usePage} from "@inertiajs/react";
import BootstrapTable from "@/Components/BootstrapTable.jsx";

const MyAnnouncements = ({announcements}) => {

    const {trans} = usePage().props;

    return (
        <MainLayout title={trans.frontend.my_announcements || 'My announcements '}>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <BootstrapTable data={announcements} trans={trans.frontend}/>
                    </div>
                </div>
            </div>
        </MainLayout>
    );
};

export default MyAnnouncements;
