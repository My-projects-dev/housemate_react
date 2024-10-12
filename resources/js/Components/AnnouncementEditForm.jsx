import React, {useEffect, useState, useRef} from 'react';
import {usePage} from "@inertiajs/react";
import { FaTimes } from 'react-icons/fa';
import Swal from 'sweetalert2';
import axios from "axios";
import { toast, ToastContainer } from 'react-toastify';


const AnnouncementEditForm = ({announcement }) => {
    const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const {trans, availableLanguages} = usePage().props;
    const firstErrorRef = useRef(null);

    const [country, setCountry] = useState(announcement.country || '');
    const [title, setTitle] = useState(announcement.title || '');
    const [address, setAddress] = useState(announcement.address  || '');
    const [repair, setRepair] = useState(announcement.repair  || 'repaired');
    const [floor, setFloor] = useState(announcement.floor  || '');
    const [area, setArea] = useState(announcement.area ||  '');
    const [home_type, setHomeType] = useState(announcement.home_type  || 'repair_old');
    const [room_count, setRoomCount] = useState(announcement.room_count ||  '');
    const [price, setPrice] = useState(announcement.price ||  '');
    const [currency, setCurrency] = useState(announcement.currency || '');
    const [duration, setDuration] = useState(announcement.duration || 'Monthly');
    const [age_min, setAgeMin] = useState(announcement.age_min ||  '');
    const [age_max, setAgeMax] = useState(announcement.age_max ||  '');
    const [phone, setPhone] = useState(announcement.phone ||  '');
    const [email, setEmail] = useState(announcement.email ||  '');
    const [comment, setComment] = useState(announcement.comment ||  '');
    const [number_people, setNumberPeople] = useState(announcement.number_people ||  '');
    const [number_inhabitants, setNumberInhabitants] = useState(announcement.number_inhabitants ||  '');
    const [country_phone_code, setCountryPhoneCode] = useState(announcement.country_phone_code || '');
    const [images, setImages] = useState([]);

    const [showRoommateFields, setShowRoommateFields] = useState(announcement.type === 'roommate');
    const [showFloorField, setShowFloorField] = useState(announcement.floor !== 'courtyard_house');
    const [showHomeField, setShowHomeField] = useState(announcement.home === 'yes_home' );
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [errors, setErrors] = useState({});
    const [imageData, setImageData] = useState(announcement.images);

    useEffect(() => {

        if (home_type === 'courtyard_house') {
            setShowFloorField(false);
            setFloor('');
        } else {
            setShowFloorField(true);
        }

        if (Object.keys(errors).length > 0 && firstErrorRef.current) {
            firstErrorRef.current.scrollIntoView({ behavior: 'smooth' });
        }

    }, [ home_type,  errors]);


    const handleImageChange = (e) => {
        const files = Array.from(e.target.files);
        setImages(files);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrors({});
        setIsSubmitting(true);

        const formData = new FormData();
        formData.append('_token', csrf_token);
        formData.append('country', country);
        formData.append('slug', title);
        formData.append('title', title);
        formData.append('address', address);
        formData.append('repair', repair);
        formData.append('floor', floor);
        formData.append('area', area);
        formData.append('home', announcement.home);
        formData.append('home_type', home_type);
        formData.append('room_count', room_count);
        formData.append('price', price);
        formData.append('currency', currency);
        formData.append('duration', duration);
        formData.append('age_min', age_min);
        formData.append('age_max', age_max);
        formData.append('phone', phone);
        formData.append('email', email);
        formData.append('comment', comment);
        formData.append('number_people', number_people);
        formData.append('number_inhabitants', number_inhabitants);
        formData.append('country_phone_code', country_phone_code);

        images.forEach((file, index) => {
            formData.append(`images[${index}]`, file);
        });

        try {
            // const response = await axios.put(`/announcement/update/${announcement.id}`, formData);
            const response = await axios.post(`/announcement/update/${announcement.id}`, formData);

            Swal.fire({
                icon: 'success',
                title: trans.frontend.messages.success || 'Success',
                text: trans.frontend.messages.update_successfully || 'Announcement updated successfully!',
            }).then(() => {
                window.location.reload();
            });

        } catch (error) {
            if (error.response && error.response.status === 422) {
                setErrors(error.response.data.errors);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: trans.frontend.messages.error || 'Error',
                    text: trans.frontend.messages.update_failed || 'Elan yenilənə bilmədi.',
                });
            }
        } finally {
            setIsSubmitting(false);
        }
    };

    const deleteImage = async (id) => {
        if (window.confirm(trans.frontend.messages.sure_delete_image || "Are you sure you want to delete this image?")) {
            try {
                const response = await fetch(`/announcement/delete/image/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                if (response.ok) {
                    // Məlumatları yenilə
                    setImageData((prevData) => prevData.filter((item) => item.id !== id));
                    toast.success(trans.frontend.messages.announcement_delete_image_successfully || 'Image deleted successfully!');
                } else {
                    toast.error(trans.frontend.messages.announcement_failed_image_delete || 'Failed to delete image.');
                }
            } catch (error) {
                console.error('Error during delete operation:', error);
                toast.error(trans.frontend.messages.an_error || 'An error occurred.');
            }
        }
    };

    return (

        <div>
            <div className="mb-5 flex flex-wrap gap-4">
                {imageData.map((img) => (
                    <div key={img.id} className="flex flex-col items-center border border-primary border-blue-500 p-1">
                        <img className="w-40 h-40 object-cover" src={`/uploads/announcements/${img.image}`}
                             alt={announcement.title}/>
                        <button className="btn mt-2 border-none" onClick={() => deleteImage(img.id)}>
                            <FaTimes size={24} color="red"/>
                        </button>
                    </div>
                ))}
            </div>

            <form onSubmit={handleSubmit}>
                <div className="row">
                    <div className="col-md-6 mb-4" ref={errors.country ? firstErrorRef : null}>
                        <label htmlFor="country"
                               className="form-label">{trans.frontend.select_country || 'Select country'}</label>
                        <select className={`form-control ${errors.country ? 'is-invalid' : ''}`} id="country"
                                name="country"
                                value={country}
                                onChange={(e) => setCountry(e.target.value)}>
                            {availableLanguages.map((lang, index) => (
                                <option key={index} value={lang.language} >{lang.language}</option>
                            ))}
                        </select>
                        {errors.country && <div className="invalid-feedback">{errors.country[0]}</div>}
                    </div>

                    <div className="col-md-6 mb-4" ref={errors.title ? firstErrorRef : null}>
                        <label htmlFor="title" className="form-label">{trans.frontend.title || 'Title'}*</label>
                        <input type="text" id="title"
                               className={`form-control ${errors.title ? 'is-invalid' : ''}`}
                               placeholder={trans.frontend.title || 'Title'}
                               name="title"
                               value={title} onChange={(e) => setTitle(e.target.value)}/>
                        {errors.title && <div className="invalid-feedback">{errors.title[0]}</div>}
                    </div>
                    {showHomeField && (
                        <>
                            <div className="col-md-6 mb-4" ref={errors.address ? firstErrorRef : null}>
                                <label htmlFor="address" className="form-label">{trans.frontend.address || 'Address'}*</label>
                                <input type="text" id="address"
                                       className={`form-control ${errors.address ? 'is-invalid' : ''}`}
                                       placeholder={trans.frontend.address || 'Address'}
                                       name="address"
                                       value={address} onChange={(e) => setAddress(e.target.value)}/>
                                {errors.address && <div className="invalid-feedback">{errors.address[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4" ref={errors.home_type ? firstErrorRef : null}>
                                <label htmlFor="home_type" className="form-label">{trans.frontend.home_type || 'Home Type'}</label>
                                <select className={`form-control ${errors.home_type ? 'is-invalid' : ''}`}
                                        id="home_type" name="home_type" value={home_type}
                                        onChange={(e) => setHomeType(e.target.value)}>
                                    <option value="repair_old"
                                            id="repair_old">{trans.frontend.repair_old || 'Old Building'}</option>
                                    <option value="repair_new"
                                            id="repair_new">{trans.frontend.repair_new || 'New building'}</option>
                                    <option value="courtyard_house"
                                            id="courtyard_house">{trans.frontend.courtyard_house || 'Courtyard House'}</option>
                                </select>
                                {errors.home_type && <div className="invalid-feedback">{errors.home_type[0]}</div>}
                            </div>

                            {showFloorField && (
                                <div className="col-md-6 mb-4 floor-field" ref={errors.floor ? firstErrorRef : null}>
                                    <label htmlFor="floor" className="form-label">{trans.frontend.floor || 'Floor'}</label>
                                    <input type="number" id="floor"
                                           className={`form-control ${errors.floor ? 'is-invalid' : ''}`}
                                           placeholder={trans.frontend.floor || 'Floor'}
                                           min='1' max='255'
                                           name="floor"
                                           value={floor}
                                           onChange={(e) => setFloor(e.target.value)}/>
                                    {errors.floor && <div className="invalid-feedback">{errors.floor[0]}</div>}
                                </div>

                            )}

                            <div className="col-md-6 mb-4" ref={errors.area ? firstErrorRef : null}>
                                <label htmlFor="area" className="form-label">{trans.frontend.area || 'Area'} (m<sup>2</sup>)</label>
                                <input type="number" min="0" max="999999" id="area"
                                       className={`form-control ${errors.area ? 'is-invalid' : ''}`} name="area"
                                       placeholder={trans.frontend.area || 'Area'}
                                       value={area}
                                       onChange={(e) => setArea(e.target.value)}/>
                                {errors.area && <div className="invalid-feedback">{errors.area[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4" ref={errors.repair ? firstErrorRef : null}>
                                <label htmlFor="repair" className="form-label">{trans.frontend.repair || 'Repair'}</label>
                                <select className={`form-control ${errors.repair ? 'is-invalid' : ''}`} id="repair"
                                        name="repair"
                                        value={repair}
                                        onChange={(e) => setRepair(e.target.value)}>
                                    <option value="repaired">{trans.frontend.repaired || 'Repaired'}</option>
                                    <option value="unrepaired">{trans.frontend.unrepaired || 'Unrepaired'}</option>
                                </select>
                                {errors.repair && <div className="invalid-feedback">{errors.repair[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4" ref={errors.room_count ? firstErrorRef : null}>
                                <label htmlFor="number_room" className="form-label">{trans.frontend.number_room || 'Room Number'}</label>
                                <input type="number" min="0" max="50" id="number_room"
                                       className={`form-control ${errors.room_count ? 'is-invalid' : ''}`}
                                       name="room_count"
                                       placeholder={trans.frontend.number_room || 'Room Number'}
                                       value={room_count}
                                       onChange={(e) => setRoomCount(e.target.value)}/>
                                {errors.room_count && <div className="invalid-feedback">{errors.room_count[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4">
                                <div className="row">
                                    <div className="col-4" ref={errors.price ? firstErrorRef : null}>
                                        <label htmlFor="price" className="form-label">{trans.frontend.price || 'Price'}*</label>
                                        <input type="number" min="0" id="price"
                                               className={`form-control ${errors.price ? 'is-invalid' : ''}`}
                                               placeholder={trans.frontend.price || 'Price'}
                                               name="price"
                                               value={price} onChange={(e) => setPrice(e.target.value)}/>
                                        {errors.price && <div className="invalid-feedback">{errors.price[0]}</div>}
                                    </div>

                                    <div className="col-4" ref={errors.currency ? firstErrorRef : null}>
                                        <label htmlFor="currency" className="form-label">{trans.frontend.currency || 'Currency'}</label>
                                        <select className={`form-control ${errors.currency ? 'is-invalid' : ''}`}
                                                id="currency" name="currency" value={currency}
                                                onChange={(e) => setCurrency(e.target.value)}>
                                            {availableLanguages.map((lang, index) => (
                                                <option key={index} value={lang.currency}>{lang.currency}</option>
                                            ))}
                                        </select>
                                        {errors.currency &&
                                            <div className="invalid-feedback">{errors.currency[0]}</div>}
                                    </div>

                                    <div className="col-4" ref={errors.duration ? firstErrorRef : null}>
                                        <label htmlFor="duration" className="form-label">{trans.frontend.duration || 'Duration'}</label>
                                        <select className={`form-control ${errors.duration ? 'is-invalid' : ''}`}
                                                id="duration" name="duration" value={duration}
                                                onChange={(e) => setDuration(e.target.value)}>
                                            <option value="diary">{trans.frontend.diary || 'Diary'}</option>
                                            <option value="weekly">{trans.frontend.weekly || 'Weekly'}</option>
                                            <option value="monthly">{trans.frontend.monthly || 'Monthly'}</option>
                                            <option value="yearly">{trans.frontend.yearly || 'Yearly'}</option>
                                        </select>
                                        {errors.duration && <div className="invalid-feedback">{errors.duration[0]}</div>}
                                    </div>
                                </div>
                            </div>

                            {showRoommateFields && (
                                <>
                                    <div className="col-md-6 mb-4 roommate-only">
                                        <div className="row">
                                            <label htmlFor="age_min" className="form-label">{trans.frontend.age_range || 'Yaş aralığı'}</label>
                                            <div className="col-6" ref={errors.age_min ? firstErrorRef : null}>
                                                <input type="number" min="1" max="200" step="1" id="min"
                                                       className={`form-control ${errors.age_min ? 'is-invalid' : ''}`}
                                                       name="age_min"
                                                       placeholder={trans.frontend.min_age || 'Minimum age'}
                                                       value={age_min}
                                                       onChange={(e) => setAgeMin(e.target.value)}/>
                                                {errors.age_min &&
                                                    <div className="invalid-feedback">{errors.age_min[0]}</div>}
                                            </div>
                                            <div className="col-6" ref={errors.age_max ? firstErrorRef : null}>
                                                <input type="number" min={age_min ? age_min : 10} max="200" step="1"
                                                       id="max"
                                                       className={`form-control ${errors.age_max ? 'is-invalid' : ''}`}
                                                       name="age_max"
                                                       placeholder={trans.frontend.max_age || 'Maximum age'}
                                                       value={age_max}
                                                       onChange={(e) => setAgeMax(e.target.value)}/>
                                                {errors.age_max &&
                                                    <div className="invalid-feedback">{errors.age_max[0]}</div>}
                                            </div>
                                        </div>
                                    </div>
                                </>
                            )}
                            <div className="col-md-6 mb-4" ref={errors.number_people ? firstErrorRef : null}>
                                <label htmlFor="number_people" className="form-label">{trans.frontend.number_people || 'Number of people required'}</label>
                                <input type="number" min="1" max="100" id="number_people"
                                       className={`form-control ${errors.number_people ? 'is-invalid' : ''}`}
                                       name="number_people"
                                       placeholder={trans.frontend.number_people || 'Number of people required'}
                                       value={number_people}
                                       onChange={(e) => setNumberPeople(e.target.value)}/>
                                {errors.number_people &&
                                    <div className="invalid-feedback">{errors.number_people[0]}</div>}
                            </div>


                            <div className="col-md-6 mb-4" ref={errors.number_inhabitants ? firstErrorRef : null}>
                                <label htmlFor="number_inhabitants" className="form-label">{trans.frontend.number_inhabitants || 'Current head count'}</label>
                                <input type="number" min="1" max="100" id="number_inhabitants"
                                       className={`form-control ${errors.number_inhabitants ? 'is-invalid' : ''}`}
                                       name="number_inhabitants"
                                       placeholder={trans.frontend.number_inhabitants || 'Current head count'}
                                       value={number_inhabitants}
                                       onChange={(e) => setNumberInhabitants(e.target.value)}/>
                                {errors.number_inhabitants &&
                                    <div className="invalid-feedback">{errors.number_inhabitants[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4"
                                 ref={Object.keys(errors).some(key => key.startsWith('images')) ? firstErrorRef : null}>
                                <label htmlFor="images" className="form-label">{trans.frontend.image || 'Image'}</label>
                                <input type="file" id="images" accept="image/*"
                                       className={`form-control ${Object.keys(errors).some(key => key.startsWith('images')) ? 'is-invalid' : ''}`}
                                       name="images[]"
                                       multiple onChange={handleImageChange}/>
                                {Object.keys(errors).map((key) => (
                                    key.startsWith('images') && (
                                        <div key={key} className="invalid-feedback">
                                            {errors[key].map((error, index) => (
                                                <div key={index}>{error}</div>
                                            ))}
                                        </div>
                                    )
                                ))}
                            </div>
                        </>
                    )}

                    <div className="col-md-6 mb-4">
                        <div className="row">
                            <div className="col-3" ref={errors.country_phone_code ? firstErrorRef : null}>
                                <label htmlFor="country_phone_code" className="form-label">{trans.frontend.country_code || 'Country code'}</label>
                                <select className={`form-control ${errors.country_phone_code ? 'is-invalid' : ''}`}
                                        id="country_phone_code"
                                        name="country_phone_code"
                                        value={country_phone_code}
                                        onChange={(e) => setCountryPhoneCode(e.target.value)}>
                                    {availableLanguages.map((lang, index) => (
                                        <option key={index} value={lang.country_phone_code}>{lang.country_phone_code}</option>
                                    ))}
                                </select>
                                {errors.country_phone_code &&
                                    <div className="invalid-feedback">{errors.country_phone_code[0]}</div>}
                            </div>
                            <div className="col-9" ref={errors.phone ? firstErrorRef : null}>
                                <label htmlFor="phone" className="form-label">{trans.frontend.phone || 'Phone number'}*</label>
                                <input type="tel" id="phone"
                                       className={`form-control ${errors.phone ? 'is-invalid' : ''}`}
                                       placeholder={trans.frontend.phone || 'Phone number'}
                                       name="phone"
                                       value={phone}
                                       pattern="[0-9]*"
                                       onInput={(e) => e.target.value = e.target.value.replace(/\D/, '')}
                                       onChange={(e) => setPhone(e.target.value)}/>
                                {errors.phone && <div className="invalid-feedback">{errors.phone[0]}</div>}
                            </div>
                        </div>
                    </div>

                    <div className="col-md-6 mb-4" ref={errors.email ? firstErrorRef : null}>
                        <label htmlFor="email" className="form-label">{trans.frontend.email || 'Email'}</label>
                        <input type="email" id="email"
                               className={`form-control ${errors.email ? 'is-invalid' : ''}`}
                               placeholder={trans.frontend.email || 'Email'}
                               name="email"
                               value={email}
                               onChange={(e) => setEmail(e.target.value)}/>
                        {errors.email && <div className="invalid-feedback">{errors.email[0]}</div>}

                    </div>


                    <div className="col-md-12 mb-4" ref={errors.comment ? firstErrorRef : null}>
                        <label htmlFor="comment" className="form-label">{trans.frontend.additional_information || 'Additional information'}</label>
                        <textarea id="comment"
                                  className={`form-control ${errors.comment ? 'is-invalid' : ''}`}
                                  placeholder={trans.frontend.additional_information || 'Additional information'}
                                  name="comment"
                                  rows="4"
                                  value={comment}
                                  onChange={(e) => setComment(e.target.value)}></textarea>
                        {errors.comment && <div className="invalid-feedback">{errors.comment[0]}</div>}
                    </div>

                    <div className="col-md-12">
                        <button type="submit" className="btn btn-primary add-announcement-btn border my-4"
                                disabled={isSubmitting}> {isSubmitting ? trans.frontend.sending : trans.frontend.send}</button>
                    </div>
                </div>
                <ToastContainer />
            </form>
        </div>
    );
};

export default AnnouncementEditForm;
