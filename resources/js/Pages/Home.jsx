import React, {useState, useEffect} from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import Cart from "@/Components/Cart.jsx";
import Carts from "@/Components/Carts.jsx";
import Pagination from "@/Components/Pagination.jsx"; // Import the Pagination component
import {usePage} from "@inertiajs/react";
import axios from 'axios';

function Home() {
    const {language, trans, announcements: initialAnnouncements} = usePage().props;
    const [announcements, setAnnouncements] = useState(initialAnnouncements.data);
    const [currentPage, setCurrentPage] = useState(initialAnnouncements.current_page);
    const [lastPage, setLastPage] = useState(initialAnnouncements.last_page);

    const fetchAnnouncements = (page = 1) => {
        axios.get(`/${language}/announcements?page=${page}`)
            .then(response => {
                setAnnouncements(response.data.data);
                setCurrentPage(response.data.current_page);
                setLastPage(response.data.last_page);
            })
            .catch(error => {
                console.error('Error fetching announcements:', error);
            });
    };

    useEffect(() => {
        const interval = setInterval(() => {
            fetchAnnouncements(currentPage);
        }, 5000);

        return () => clearInterval(interval);
    }, [language, currentPage]);

    return (
        <MainLayout title={trans.housemate || 'Housemate'}>
            <h2>{trans.home || 'Home'}</h2>
            <Carts>
                {announcements.map((announcement) => (
                    <Cart key={announcement.id} announcement={announcement}/>
                ))}


                {/* Reusable Pagination Component */}
                <Pagination
                    currentPage={currentPage}
                    lastPage={lastPage}
                    onPageChange={(page) => fetchAnnouncements(page)}
                />
            </Carts>
        </MainLayout>
    );
}

export default Home;
