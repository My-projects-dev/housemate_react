import React from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import ContactForm from "@/Components/ContactForm.jsx";
import {usePage} from "@inertiajs/react";

const Contact = () => {

    const {trans} = usePage().props;

    return (
        <MainLayout title={trans.frontend.contact || 'Contact'}>
            <div className="text-center">
            <h2>{trans.frontend.contact_title || 'Welcome to Roommate Finder'}</h2>
            <p>{trans.frontend.contact_sub_title || 'Your perfect place to find roommates and rental properties worldwide.'}</p>
            </div>
            <ContactForm />
        </MainLayout>
    );
};

export default Contact;
