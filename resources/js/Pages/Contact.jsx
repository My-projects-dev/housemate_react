import React from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import ContactForm from "@/Components/ContactForm.jsx";
import {usePage} from "@inertiajs/react";

const Contact = () => {

    const {trans} = usePage().props;

    return (
        <MainLayout title={trans.contact || 'Contact'}>
            <h2>Welcome to Roommate Finder</h2>
            <p>Your perfect place to find roommates and rental properties worldwide.</p>
            <ContactForm />
        </MainLayout>
    );
};

export default Contact;
