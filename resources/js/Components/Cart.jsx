import React from 'react';
import {Link, usePage} from "@inertiajs/react";

function Cart({announcement}) {

    const {language} = usePage().props;
    return (
        <div className="col-md-4 col-sm-6 mb-4">
            <div className="card card-custom">
                <Link href={route('announcement.detail', [language, announcement.slug])}>
                    <img
                        src={announcement.images.length > 0 && announcement.images[0].image
                            ? `/uploads/announcements/${announcement.images[0].image}`
                            : 'https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png'}
                        alt={announcement.title || ''}
                    />
                    <div className="card-body">
                        <div className="d-flex justify-content-between">
                            <p className="card-text text-danger">{announcement.type || ''}</p>
                            <p className="card-text">{announcement.created_at || ''}</p>
                        </div>
                        <h5 className="card-title">{announcement.title || ''}</h5>
                        {/*<p className="cart-comment">{announcement.home === 'no_home' && announcement.comment}</p>*/}
                        <p className="card-address">{announcement.address || ''}</p>
                        <p className="card-text">
                            {announcement.room_count && `${announcement.room_count} otaq  / `}
                            {announcement.area && `${announcement.area} m²  `}
                            {announcement.floor && `/ mərtəbə ${announcement.floor}`}
                        </p>
                        {announcement.price && announcement.currency && ( // Only render if price and currency exist
                            <h5 className="card-text text-end">
                                {announcement.price || ''} {announcement.currency || ''}
                                {announcement.duration && ` / ${announcement.duration.toUpperCase()}`}
                            </h5>
                        )}
                    </div>
                </Link>
            </div>
        </div>

    );
}

export default Cart;
