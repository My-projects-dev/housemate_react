import React from 'react';
import Header from "@/Layouts/Header.jsx";
import Footer from "@/Layouts/Footer.jsx";
import {Head} from "@inertiajs/react";

const MainLayout = ({ children, title='' }) => {
    return (
        <>
            <Head title={title}/>
            <Header />
            <main>{children}</main>
            <Footer />
        </>
    );
};

export default MainLayout;
