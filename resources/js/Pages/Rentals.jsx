import React from 'react';
import Cart from "@/Components/Cart.jsx";
import Carts from "@/Components/Carts.jsx";
import MainLayout from "@/Layouts/MainLayout.jsx";
import {usePage} from "@inertiajs/react";

function Rentals() {

    const {trans} = usePage().props;

    return (
            <MainLayout title={trans.rent || 'Rentals'}>
                <h2>Rentals</h2>
                <Carts>
                    <Cart />
                </Carts>
            </MainLayout>
    );
}

export default Rentals;
