import React from 'react';
import HeaderLayout from "@/Layouts/HeaderLayout.jsx";
import FooterLayout from "@/Layouts/FooterLayout.jsx";
import {Head} from "@inertiajs/react";
import SearchLayout from "@/Layouts/SearchLayout.jsx";

const MainLayout = ({ children, title='' }) => {
    return (
        <>
            <Head title={title}/>
            <HeaderLayout />
            <>{children}</>
            <FooterLayout />
        </>
    );
};

export default MainLayout;