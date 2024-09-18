import React from 'react';
import Cart from "@/Components/Cart.jsx";
import Carts from "@/Components/Carts.jsx";
import MainLayout from "@/Layouts/MainLayout.jsx";
import {usePage} from "@inertiajs/react";

function Housemate() {

    const {trans} = usePage().props;

    return (
            <MainLayout title={trans.housemate || 'Housemate'}>
                <h2>{trans.housemate || 'Housemate'}</h2>
                <Carts>
                    <Cart />
                </Carts>
            </MainLayout>
    );
}

export default Housemate;
