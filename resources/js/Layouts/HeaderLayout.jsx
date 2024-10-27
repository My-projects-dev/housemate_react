import React, { useEffect, useState } from 'react';
import { route } from "ziggy-js";
import { Link, router, usePage } from '@inertiajs/react';
import AnnouncementForm from '@/Components/AnnouncementForm.jsx';
import Dropdown from "@/Components/Dropdown.jsx";
import UserDataDropdown from "@/Components/UserDataDropdown.jsx";


function HeaderLayout() {
    const { trans, language, availableLanguages, auth, flash } = usePage().props;
    const [isFormVisible, setIsFormVisible] = useState(false);
    const [isDropdownOpen, setIsDropdownOpen] = useState(false);
    const [isMenuOpen, setIsMenuOpen] = useState(false);

    useEffect(() => {

        // Show alert if user has not verified email
        if (flash && flash.alert) {
            window.alert(flash.alert);
        }

        if (localStorage.getItem('showForm') === 'true') {
            setIsFormVisible(true);
            localStorage.removeItem('showForm');
        }

        if (!auth.user) {
            setIsFormVisible(false);
        }
    }, [flash]);

    const toggleDropdown = () => {
        setIsDropdownOpen(!isDropdownOpen);
    };

    const toggleFormVisibility = () => {
        if (auth.user) {
            setIsFormVisible(!isFormVisible);
        } else {
            localStorage.setItem('showForm', 'true');
            router.visit(route('login', {language}));
        }
    };

    const toggleMenu = () => {
        setIsMenuOpen(!isMenuOpen);
    };

    return (
        <header>
            <div className="d-flex">
                <button className="hamburger" onClick={toggleMenu}>&#9776;</button>
                <h1 className="font-bold flex-grow-1">
                    <Link href={route('home', [language])}>Housemate Finder</Link>
                </h1>
            </div>

            <nav className={isMenuOpen ? 'open' : ''}>
                <ul>
                    <li><Link href={route('home', [language])}>{trans.frontend.home || 'Home'}</Link></li>
                    <li><Link href={route('housemate', [language])}>{trans.frontend.housemate || 'Housemate'}</Link>
                    </li>
                    <li><Link href={route('rentals', [language])}>{trans.frontend.rent || 'Rentals'}</Link></li>
                    <li><Link href={route('contact', [language])}>{trans.frontend.contact || 'Contact'}</Link></li>
                    <li className="relative">
                        <span
                            className="cursor-pointer"
                            onClick={toggleDropdown}
                        >
                            {trans.frontend.language || 'Language'}
                        </span>
                        {isDropdownOpen && (
                            <ul className="absolute left-0 border mt-2 p-1 rounded shadow bg-[#007BFF] language-dropdown max-h-80 overflow-y-auto">
                                {availableLanguages
                                    .filter((value, index, self) =>
                                            index === self.findIndex((t) => (
                                                t.language === value.language
                                            ))
                                    )
                                    .sort((a, b) => a.lang_code.localeCompare(b.lang_code))
                                    .map((lang, index) => (
                                        <li key={index}
                                            className={language === lang.lang_code ? 'font-bold mx-0' : 'mx-0'}>
                                            <Link
                                                href={route('home', [lang.lang_code])}
                                                className="block px-4 py-2 hover:bg-gray-100 hover:text-[#007BFF]"
                                                onClick={() => setIsDropdownOpen(false)}
                                            >
                                                <span className="px-1">{lang.language.toUpperCase()}</span>
                                            </Link>
                                        </li>
                                    ))}
                            </ul>
                        )}
                    </li>
                    {UserDataDropdown(auth, language, trans)}
                </ul>
                <button id="toggle-form-btn" className="open-announcement-btn btn btn-primary"
                        onClick={toggleFormVisibility}>
                    <i className="fa fa-plus"></i> {trans.frontend.new_announcement || 'New announcement'}
                </button>
                {isFormVisible && <AnnouncementForm toggleFormVisibility={toggleFormVisibility}/>}
            </nav>
        </header>
    );
}

export default HeaderLayout;
