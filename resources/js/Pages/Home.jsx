import React, { useState, useEffect } from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import Cart from "@/Components/Cart.jsx";
import Carts from "@/Components/Carts.jsx";
import { usePage } from "@inertiajs/react";
import axios from 'axios';

function Home() {
    const { language, trans, announcements: initialAnnouncements } = usePage().props;
    const [announcements, setAnnouncements] = useState(initialAnnouncements);

    useEffect(() => {
        const interval = setInterval(() => {
            axios.get(`/${language}/announcements`)
                .then(response => {
                    setAnnouncements(response.data);
                })
                .catch(error => {
                    console.error('Error fetching announcements:', error);
                });
        }, 5000); // Poll every 5 seconds

        return () => clearInterval(interval);
    }, [language]);

    return (
        <MainLayout title={trans.housemate || 'Housemate'}>
            <h2>{trans.home || 'Home'}</h2>
            <Carts>
                {announcements.map((announcement) => (
                    <Cart key={announcement.id} announcement={announcement} />
                ))}
            </Carts>

        </MainLayout>
    );
}

export default Home;
