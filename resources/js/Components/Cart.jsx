import React from 'react';
import { Link, usePage } from "@inertiajs/react";
import formatDate from "@/utils/formatDate.js";
function Cart({ announcement }) {
    const { language, trans } = usePage().props;

    return (
        <div className="col-md-4 col-sm-6 mb-4">
            <div className="card card-custom">
                <Link href={route('announcement.detail', [language, announcement.slug])}>
                    <img
                        src={announcement.images.length > 0 && announcement.images[0].image
                            ? `/uploads/announcements/${announcement.images[0].image}`
                            : 'https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png'}
                        alt={announcement.title || ''}
                        className="card-img-top"
                    />
                    <div className="card-body">
                        <div className="d-flex justify-content-between">
                            <p className="card-text text-danger">
                                {trans.frontend[announcement.type] || ''}
                            </p>
                            <p className="card-text">
                                {formatDate(announcement.created_at, trans)}
                            </p>
                        </div>
                        <h5 className="card-title">{announcement.title || ''}</h5>
                        {announcement.home === 'no_home' && (
                            <p className="cart-comment">{announcement.comment}</p>
                        )}
                        <p className="card-address">{announcement.address || ''}</p>
                        <p className="card-text">
                            {announcement.room_count && `${announcement.room_count} ${trans.frontend.room.toLowerCase()} / `}
                            {announcement.area && `${announcement.area} m² `}
                            {announcement.floor && `/ ${trans.frontend.floor.toLowerCase()} ${announcement.floor}`}
                        </p>
                        <div className="d-flex justify-content-between align-items-center">
                            <span className="badge rounded-pill bg-primary">
                                <i className="fa fa-eye"> {announcement.views}</i>
                            </span>
                            {announcement.price && announcement.currency && (
                                <h5 className="card-text">
                                    {announcement.price} {announcement.currency}
                                    {announcement.duration && trans.frontend[announcement.duration]
                                        ? ` / ${trans.frontend[announcement.duration]}`
                                        : ''
                                    }
                                </h5>
                            )}
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    );
}

export default Cart;
