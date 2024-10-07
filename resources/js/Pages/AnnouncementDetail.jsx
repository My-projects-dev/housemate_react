import * as React from 'react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import {usePage} from "@inertiajs/react";
import SearchLayout from "@/Layouts/SearchLayout.jsx";
import "react-image-gallery/styles/css/image-gallery.css";
import ImageGallery from 'react-image-gallery';

function AnnouncementDetail() {
    const {trans, announcement} = usePage().props;
    const images = announcement.images.map(img => ({
        original: `/uploads/announcements/${img.image}`,   // Large image
        thumbnail: `/uploads/announcements/${img.image}`   // Thumbnail
    }));
    console.log(images)
    return (
        <MainLayout title={announcement.title || 'Housemate'}>
            <SearchLayout/>

            <div className="d-md-flex my-md-5">
                <div className="add col-2 h-100">
                </div>
                <div className="col-md-8">
                    {images.length > 0 &&
                        <div className="image-carousel mb-4">
                            <ImageGallery items={images}/>
                        </div>
                    }
                    <div className="my-5 mx-2">
                        <h4 className="text-center">{announcement.title || ''}</h4><br/>

                        <div className="row">
                            <div className="col-md-6">
                                <p><strong>{trans.frontend.type_of_announcement || 'Type of announcement'}:</strong> {announcement.type ? announcement.type.charAt(0).toUpperCase() + announcement.type.slice(1) : ''}</p>
                                {announcement.address && (
                                    <p><strong>{trans.frontend.address || 'Address'}:</strong> {announcement.address}</p>
                                )}
                                {announcement.home_type && (
                                    <p><strong>{trans.frontend.home_type || 'Home Type'}:</strong> {announcement.home_type}</p>
                                )}
                                {announcement.floor && (
                                    <p><strong>{trans.frontend.floor || 'Floor'}:</strong> {announcement.floor}</p>
                                )}
                                {announcement.area && (
                                    <p><strong>{trans.frontend.area || 'Area'}:</strong> {announcement.area}m<sup>2</sup></p>
                                )}
                                {announcement.repair && (
                                    <p><strong>{trans.frontend.repair || 'Repair'}:</strong> {announcement.repair}</p>
                                )}
                            </div>

                            <div className="col-md-6">
                                {announcement.number_room && (
                                    <p><strong>{trans.frontend.number_room || 'Room Number'}:</strong> {announcement.number_room}</p>
                                )}
                                {announcement.price && (
                                    <p>
                                        <strong>{trans.frontend.price || 'Price'}:</strong> {announcement.duration ? `${trans.frontend[announcement.duration.toLowerCase()]} ` : ''}
                                        {announcement.price} {announcement.currency || ''}
                                    </p>
                                )}
                                {announcement.age_min && (
                                    <p><strong>{trans.frontend.age_range || 'Yaş aralığı'}:</strong> {announcement.age_min} - {announcement.age_max || ''}</p>
                                )}
                                {announcement.number_people && (
                                    <p><strong>{trans.frontend.number_people || 'Number of people required'}:</strong> {announcement.number_people}</p>
                                )}
                                {announcement.number_inhabitants && (
                                    <p><strong>{trans.frontend.number_inhabitants || 'Current head count'}:</strong> {announcement.number_inhabitants}</p>
                                )}
                                {announcement.phone && (
                                    <p><strong>{trans.frontend.country_code || 'Country code'}:</strong> {announcement.country_phone_code || ''}{announcement.phone}</p>
                                )}
                            </div>
                        </div>
                        {announcement.email && <p><strong>{trans.frontend.email || 'Email'}:</strong> {announcement.email}</p>}
                        {announcement.comment && (
                            <p><strong>{trans.frontend.additional_information || 'Additional information'}:</strong><br/>
                                {announcement.comment}
                            </p>
                        )}
                    </div>
                </div>
                <div className="add col-2 h-100">

                </div>
            </div>
        </MainLayout>
    );
}

export default AnnouncementDetail;
