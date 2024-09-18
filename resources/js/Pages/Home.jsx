import React from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import Cart from "@/Components/Cart.jsx";
import Carts from "@/Components/Carts.jsx";
import {usePage} from "@inertiajs/react";



function Home() {

    const {trans, announcements} = usePage().props;

    return (
        <MainLayout title={trans.housemate || 'Housemate'}>
            <h2>{trans.home || 'Home'}</h2>
            <Carts >
                {announcements.map((announcement) => (
                    <Cart key={announcement.id} announcement={announcement}/>
                ))}
            </Carts>
        </MainLayout>
    );
}

export default Home;
