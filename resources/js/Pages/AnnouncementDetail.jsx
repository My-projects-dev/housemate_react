import * as React from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import {usePage} from "@inertiajs/react";
import SearchLayout from "@/Layouts/SearchLayout.jsx";
import {Carousel} from "react-responsive-carousel";
// import "react-responsive-carousel/lib/styles/carousel.min.css";
import "react-image-gallery/styles/css/image-gallery.css";
import ImageGallery from 'react-image-gallery';

function AnnouncementDetail() {
    const {trans, announcement} = usePage().props;
    const images = announcement.images.map(img => ({
        original: `/uploads/announcements/${img.image}`,   // Large image
        thumbnail: `/uploads/announcements/${img.image}`   // Thumbnail
    }));

    return (
        <MainLayout title={announcement.title || 'Housemate'}>
            <SearchLayout/>

            <div className="d-md-flex my-md-5">
                <div className="add col-2 h-100">
                </div>
                <div className="col-md-8">
                    <div className="image-carousel">
                    <ImageGallery items={images}/>
                    </div>
                    <div className="my-5">
                        <p>aaaaaaaaaaaaaaa</p>
                        <p>aaaaaaaaaaaaaaa</p>
                        <p>aaaaaaaaaaaaaaa</p>
                        <p>aaaaaaaaaaaaaaa</p>
                    </div>
                </div>
                <div className="add col-2 h-100">

                </div>
            </div>
        </MainLayout>
    );
}

export default AnnouncementDetail;
