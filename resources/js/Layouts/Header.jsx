import React, {useState} from 'react';
import {route} from "ziggy-js";
import {Link, router, usePage} from '@inertiajs/react';
import AnnouncementForm from '@/Components/AnnouncementForm.jsx';

function Header() {
    const [isFormVisible, setIsFormVisible] = useState(false);
    const {trans, language, availableLanguages, auth} = usePage().props;
    const [isDropdownOpen, setIsDropdownOpen] = useState(false);
    const [isMenuOpen, setIsMenuOpen] = useState(false);

    const toggleDropdown = () => {
        setIsDropdownOpen(!isDropdownOpen);
    };

    const toggleFormVisibility = () => {
        if (auth.user) {
            setIsFormVisible(!isFormVisible);
        } else {
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
                <h1 className="font-bold flex-grow-1">Housemate Finder</h1>
            </div>

            <nav className={isMenuOpen ? 'open' : ''}>
                <ul>
                    <li><Link href={route('home', [language])}>{trans.home || 'Home'}</Link></li>
                    <li><Link href={route('housemate', [language])}>{trans.housemate || 'Housemate'}</Link></li>
                    <li><Link href={route('rentals', [language])}>{trans.rent || 'Rentals'}</Link></li>
                    <li><Link href={route('contact', [language])}>{trans.contact || 'Contact'}</Link></li>

                    {auth.user ? (
                        <li><Link href={route('dashboard', [language])}>{trans.dashboard || 'Dashboard'}</Link></li>
                    ) : (
                        <>
                            <li><Link href={route('login', [language])}>{trans.login || 'Login'}</Link></li>
                            <li><Link href={route('register', [language])}>{trans.register || 'Register'}</Link>
                            </li>
                        </>
                    )}
                    <li className="relative">
                        <span
                            className="cursor-pointer"
                            onClick={toggleDropdown}
                        >
                            {trans.language || 'Language'}
                        </span>
                        {isDropdownOpen && (
                            <ul className="absolute left-0 border mt-2 p-1 rounded shadow bg-[#007BFF] language-dropdown">
                                {availableLanguages.map((lang, index) => (
                                    <li key={index} className={language === lang.lang_code ? 'font-bold' : ''}>
                                        <Link
                                            href={route('home', [lang.lang_code])}
                                            className="block px-4 py-2 hover:bg-gray-100 hover:text-[#007BFF]"
                                            onClick={() => setIsDropdownOpen(false)}
                                        >
                                            {lang.lang_code.toUpperCase()}
                                        </Link>
                                    </li>
                                ))}
                            </ul>
                        )}
                    </li>
                </ul>
                <button id="toggle-form-btn" className="add-announcement-btn btn btn-primary"
                        onClick={toggleFormVisibility}>
                    <i className="fa fa-plus"></i> {trans.new_announcement || 'New announcement'}
                </button>
                {isFormVisible && <AnnouncementForm toggleFormVisibility={toggleFormVisibility}/>}
            </nav>
        </header>
    );
}

export default Header;
