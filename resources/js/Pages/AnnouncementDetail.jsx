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
                        <h4 className="text-center">{announcement.title || ''}</h4><br/>
                        <p>{trans.frontend.type_of_announcement || 'Type of announcement'}: {announcement.country || ''}</p>
                        <p>{trans.frontend.type_of_announcement || 'Type of announcement'}: {announcement.type ? announcement.type.charAt(0).toUpperCase() + announcement.type.slice(1) : ''}</p>
                        <p>{trans.frontend.address || 'Address'}: {announcement.address || ''}</p>
                        <p>{trans.frontend.home_type || 'Home Type'}: {announcement.home_type || ''}</p>
                        <p>{trans.frontend.floor || 'Floor'}: {announcement.floor || ''}</p>
                        <p>{trans.frontend.area || 'Area'}: {announcement.area || ''}m<sup>2</sup></p>
                        <p>{trans.frontend.repair || 'Repair'}: {announcement.repair || ''}</p>
                        <p>{trans.frontend.number_room || 'Room Number'}: {announcement.number_room || ''}</p>
                        <p>{trans.frontend.price || 'Price'}: {announcement.duration ? `${trans.frontend[announcement.duration.toLowerCase()]} ` : ''}
                            {announcement.price || ''} {announcement.currency || ''}
                        </p>
                        <p>{trans.frontend.age_range || 'Yaş aralığı'}: {announcement.age_min ? `${announcement.age_min} - ` : ''}{announcement.age_max || ''}</p>
                        <p>{trans.frontend.number_people || 'Number of people required'}: {announcement.number_people || ''}</p>
                        <p>{trans.frontend.number_inhabitants || 'Current head count'}: {announcement.number_inhabitants || ''}</p>
                        <p>{trans.frontend.country_code || 'Country code'}: {announcement.country_phone_code || ''}{announcement.phone || ''}</p>
                        <p>{trans.frontend.email || 'Email'}: {announcement.email || ''}</p>
                        <p>{trans.frontend.additional_information || 'Additional information'}:</p>
                        <p>{announcement.comment || ''}</p>
                    </div>
                </div>
                <div className="add col-2 h-100">

                </div>
            </div>
        </MainLayout>
    );
}

export default AnnouncementDetail;
