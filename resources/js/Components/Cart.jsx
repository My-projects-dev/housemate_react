import React from 'react';

function Cart({ announcement }) {
    return (

        <div className="col-md-4 col-sm-6 mb-4">
            <div className="card card-custom">
                <a href="#">
                    <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png"
                         className="card-img-top" alt="Image"/>
                    <div className="card-body">
                        <div className="d-flex justify-content-between">
                            <p className="card-text text-danger">{announcement.type || ''}</p>
                            <p className="card-text">{announcement.created_at || ''}</p>
                        </div>
                        <h5 className="card-title">{announcement.title || ''}</h5>
                        <p className="card-text card-address">{announcement.address || ''}</p>
                        <p className="card-text card-undress">
                            {announcement.room_count && `${announcement.room_count} otaq  / `}
                            {announcement.area && `${announcement.area} m²  `}
                            {announcement.floor && `/ mərtəbə ${announcement.floor}`}
                        </p>
                        <h5 className="text-end">{announcement.price || ''} {announcement.currency || ''}
                             {announcement.duration && ` / ${announcement.duration.toUpperCase()}`}
                        </h5>
                    </div>
                </a>
            </div>
        </div>

    );
}

export default Cart;
