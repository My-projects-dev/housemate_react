import React from 'react';
import {usePage} from "@inertiajs/react";

function FooterLayout() {
    const {trans} = usePage().props;


    return (
        <footer className="border-top ">
            <p>&copy; {new Date().getFullYear()} {trans.frontend.all_reserved || 'Roommate Finder. All rights reserved.'}</p>
        </footer>
    );
}

export default FooterLayout;
