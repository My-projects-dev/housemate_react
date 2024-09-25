import React from 'react';
import Cart from "@/Components/Cart.jsx";
import Carts from "@/Components/Carts.jsx";
import MainLayout from "@/Layouts/MainLayout.jsx";
import {usePage} from "@inertiajs/react";
import Pagination from "@/Components/Pagination.jsx";
import SearchLayout from "@/Layouts/SearchLayout.jsx";

function Home() {

    const {title, announcements} = usePage().props;

    return (
        <MainLayout title={title || 'Housemate'}>
            <SearchLayout />
            <Carts>
                {announcements.data.map((announcement) => (
                    <Cart key={announcement.id} announcement={announcement}/>
                ))}

                <Pagination meta={announcements} />
            </Carts>
        </MainLayout>
    );
}

export default Home;
