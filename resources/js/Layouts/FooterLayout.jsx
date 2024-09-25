import React from 'react';

function FooterLayout() {
    return (
        <footer className="border-top ">
            <p>&copy; {new Date().getFullYear()} Roommate Finder. All rights reserved.</p>
        </footer>
    );
}

export default FooterLayout;
