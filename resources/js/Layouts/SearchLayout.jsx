import React, { useState } from 'react';
import {router, usePage} from "@inertiajs/react";

const SearchLayout = () => {
    const { language } = usePage().props
    const [search, setSearch] = useState('');
    const [isFocused, setIsFocused] = useState(false);

    function handleSubmit(e) {
        e.preventDefault()
        router.post(`/${language}/search/`, {search})
    }

    return (
        <section className="search-layout">
            <form onSubmit={handleSubmit} className="search-container">
                <button type="submit" className={`bi bi-search search-icon ${isFocused ? 'focused' : ''}`}></button>
                <input
                    type="text"
                    placeholder="Search..."
                    className="search-input"
                    onFocus={() => setIsFocused(true)}
                    onBlur={() => setIsFocused(false)}
                    onChange={(e) => setSearch(e.target.value)}
                />
            </form>
        </section>
    );
};

export default SearchLayout;
