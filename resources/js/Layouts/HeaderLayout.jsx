import React, { useEffect, useState } from 'react';
import { route } from "ziggy-js";
import { Link, router, usePage } from '@inertiajs/react';
import AnnouncementForm from '@/Components/AnnouncementForm.jsx';
import Dropdown from "@/Components/Dropdown.jsx";


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
                    {auth.user ? (
                        <>
                            <li>
                                <div className="hidden sm:flex sm:items-center sm:ms-6">
                                    <div className="ms-3 relative">
                                        <Dropdown>
                                            <Dropdown.Trigger>
                                        <span className="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {auth.user.name}

                                                <svg
                                                    className="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fillRule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clipRule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                            </Dropdown.Trigger>

                                            <Dropdown.Content>
                                                <Dropdown.Link
                                                    href={route('my.announcements', [language])}>{trans.frontend.my_announcements || 'My announcements'}</Dropdown.Link>
                                                <Dropdown.Link
                                                    href={route('profile.edit', [language])}>{trans.frontend.profile || 'Profile'}</Dropdown.Link>
                                                <Dropdown.Link href={route('logout')} method="post"
                                                               as="button">{trans.frontend.log_out || 'Log Out'}</Dropdown.Link>
                                            </Dropdown.Content>
                                        </Dropdown>
                                    </div>
                                </div>

                            </li>
                        </>
                    ) : (
                        <>
                            <li><Link href={route('login', [language])}>{trans.frontend.login || 'Login'}</Link></li>
                            <li><Link
                                href={route('register', [language])}>{trans.frontend.register || 'Register'}</Link></li>
                        </>
                    )}
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
