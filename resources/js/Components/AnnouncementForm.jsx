import React, {useEffect, useState, useRef} from 'react';
import {usePage} from "@inertiajs/react";
import Swal from 'sweetalert2';
import axios from "axios";

const AnnouncementForm = ({ toggleFormVisibility }) => {
    const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const {trans, availableLanguages, auth, language} = usePage().props;
    const firstErrorRef = useRef(null);

    const [country, setCountry] = useState(availableLanguages[0]?.language || '');
    const [type, setType] = useState('roommate');
    const [home, setHome] = useState('yes_home');
    const [title, setTitle] = useState('');
    const [address, setAddress] = useState('');
    const [repair, setRepair] = useState('repaired');
    const [floor, setFloor] = useState('');
    const [area, setArea] = useState('');
    const [home_type, setHomeType] = useState('repair_old');
    const [room_count, setRoomCount] = useState('');
    const [price, setPrice] = useState('');
    const [currency, setCurrency] = useState(availableLanguages[0]?.currency || '');
    const [duration, setDuration] = useState('Monthly');
    const [age_min, setAgeMin] = useState('');
    const [age_max, setAgeMax] = useState('');
    const [phone, setPhone] = useState('');
    const [email, setEmail] = useState('');
    const [comment, setComment] = useState('');
    const [number_people, setNumberPeople] = useState('');
    const [number_inhabitants, setNumberInhabitants] = useState('');
    const [country_phone_code, setCountryPhoneCode] = useState(availableLanguages[0]?.country_phone_code || '');
    const [images, setImages] = useState([]);

    const [showRoommateFields, setShowRoommateFields] = useState(true);
    const [showFloorField, setShowFloorField] = useState(true);
    const [showHomeField, setShowHomeField] = useState(true);
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [errors, setErrors] = useState({});

    useEffect(() => {

        if (home === 'yes_home') {
            setShowHomeField(true);
            setHomeType(prevHomeType => prevHomeType || 'repair_old');
        } else if (home === 'no_home') {
            setShowHomeField(false);

            setArea('');
            setFloor('');
            setPrice('');
            setEmail('');
            setAgeMin('');
            setAgeMax('');
            setRepair('');
            setAddress('');
            setHomeType('');
            setRoomCount('');
            setNumberPeople('');
            setNumberInhabitants('');
        }

        if (type === 'roommate') {
            setShowRoommateFields(true);

        } else if (type === 'rent') {
            setShowHomeField(true);
            setShowRoommateFields(false);

            setAgeMin('');
            setAgeMax('');
            setHome('yes_home');
        }

        if (home_type === 'courtyard_house') {
            setShowFloorField(false);
            setFloor('');
        } else {
            setShowFloorField(true);
        }

        if (Object.keys(errors).length > 0 && firstErrorRef.current) {
            firstErrorRef.current.scrollIntoView({ behavior: 'smooth' });
        }

    }, [type, home_type, home, errors]);


    const handleImageChange = (e) => {
        const files = Array.from(e.target.files);
        setImages(files);
    };

    const resetForm = () => {
        setTitle('');
        setAddress('');
        setFloor('');
        setArea('');
        setRoomCount('');
        setPrice('');
        setAgeMin('');
        setAgeMax('');
        setPhone('');
        setEmail('');
        setComment('');
        setNumberPeople('');
        setNumberInhabitants('');
        setImages([]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrors({});
        setIsSubmitting(true);

        const formData = new FormData();
        formData.append('_token', csrf_token);
        formData.append('user_id', auth.user.id);
        formData.append('country', country);
        formData.append('language', language);
        formData.append('type', type);
        formData.append('home', home);
        formData.append('slug', title);
        formData.append('title', title);
        formData.append('address', address);
        formData.append('repair', repair);
        formData.append('floor', floor);
        formData.append('area', area);
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
            const response = await axios.post('/announcement', formData);

            Swal.fire({
                icon: 'success',
                title: trans.frontend.messages.success || 'Success',
                text: trans.frontend.messages.insert_successfully || 'Announcement inserted successfully!',
            }).then(() => {
                resetForm();
                window.location.reload();
            });

        } catch (error) {
            if (error.response && error.response.status === 422) {
                setErrors(error.response.data.errors);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: trans.frontend.messages.error ||'Error',
                    text: error,
                });
            }
        } finally {
            setIsSubmitting(false);
        }
    };


    return (
        <div id="announcement-form">
            <form onSubmit={handleSubmit}>
                <div className="row">
                    <div className="col-md-6 mb-4" ref={errors.country ? firstErrorRef : null}>
                        <label htmlFor="country" className="form-label">{trans.frontend.select_country || 'Select country'}</label>
                        <select className={`form-control ${errors.country ? 'is-invalid' : ''}`} id="country"
                                name="country"
                                value={country}
                                onChange={(e) => setCountry(e.target.value)}>
                            {availableLanguages.map((lang, index) => (
                                <option key={index} value={lang.language}>{lang.language}</option>
                            ))}
                        </select>
                        {errors.country && <div className="invalid-feedback">{errors.country[0]}</div>}
                    </div>

                    <div className="col-md-6 mb-4" ref={errors.type ? firstErrorRef : null}>
                        <label htmlFor="type" className="form-label">{trans.frontend.type_of_announcement || 'Type of announcement'}</label>
                        <select className={`form-control ${errors.type ? 'is-invalid' : ''}`}
                                id="type"
                                name="type"
                                value={type}
                                onChange={(e) => setType(e.target.value)}>
                            <option value="roommate" id="type-roommate">{trans.frontend.roommate || 'Roommate'}</option>
                            <option value="rent" id="type-rent">{trans.frontend.rent || 'Rentals'}</option>
                        </select>
                        {errors.type && <div className="invalid-feedback">{errors.type[0]}</div>}
                    </div>

                    {showRoommateFields && (
                        <div className="col-md-6 mb-4">
                            <label htmlFor="home" className="form-label">{trans.frontend.house || 'House'}</label>
                            <select className={`form-control ${errors.home ? 'is-invalid' : ''}`}
                                    id="home"
                                    name="home"
                                    value={home}
                                    ref={errors.home ? firstErrorRef : null}
                                    onChange={(e) => setHome(e.target.value)}>
                                <option value="yes_home" id="yes_home">{trans.frontend.yes_home || 'There is a house'}</option>
                                <option value="no_home" id="no_home">{trans.frontend.no_home || 'There is no house'}</option>
                            </select>
                            {errors.home && <div className="invalid-feedback">{errors.home[0]}</div>}
                        </div>
                    )}

                    <div className="col-md-6 mb-4" ref={errors.title ? firstErrorRef : null}>
                        <label htmlFor="title" className="form-label">{trans.frontend.title || 'Title'}*</label>
                        <input type="text" id="title"
                               className={`form-control ${errors.title ? 'is-invalid' : ''}`}
                               placeholder="Elanın başlığı"
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
                                       placeholder="Ünvan"
                                       name="address"
                                       value={address} onChange={(e) => setAddress(e.target.value)}/>
                                {errors.address && <div className="invalid-feedback">{errors.address[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4" ref={errors.home_type ? firstErrorRef : null}>
                                <label htmlFor="home_type" className="form-label">{trans.frontend.home_type || 'Home Type'}</label>
                                <select className={`form-control ${errors.home_type ? 'is-invalid' : ''}`}
                                        id="home_type" name="home_type" value={home_type}
                                        onChange={(e) => setHomeType(e.target.value)}>
                                    <option value="repair_old" id="repair_old">{trans.frontend.repair_old || 'Old Building'}</option>
                                    <option value="repair_new" id="repair_new">{trans.frontend.repair_new || 'New building'}</option>
                                    <option value="courtyard_house" id="courtyard_house">{trans.frontend.courtyard_house || 'Courtyard House'}</option>
                                </select>
                                {errors.home_type && <div className="invalid-feedback">{errors.home_type[0]}</div>}
                            </div>

                            {showFloorField && (

                                <div className="col-md-6 mb-4 floor-field" ref={errors.floor ? firstErrorRef : null}>
                                    <label htmlFor="floor" className="form-label">{trans.frontend.floor || 'Floor'}</label>
                                    <input type="number" id="floor"
                                           className={`form-control ${errors.floor ? 'is-invalid' : ''}`}
                                           placeholder="Mərtəbə"
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
                                       placeholder="Sahə"
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
                                       placeholder="Otaq sayı"
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
                                               placeholder="Qiymət"
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
                                                       placeholder="Minimum"
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
                                                       placeholder="Maksimum"
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
                                       placeholder="Adam sayı"
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
                                       placeholder="Adam sayı"
                                       value={number_inhabitants}
                                       onChange={(e) => setNumberInhabitants(e.target.value)}/>
                                {errors.number_inhabitants &&
                                    <div className="invalid-feedback">{errors.number_inhabitants[0]}</div>}
                            </div>

                            <div className="col-md-6 mb-4"
                                 ref={Object.keys(errors).some(key => key.startsWith('images')) ? firstErrorRef : null}>
                                <label htmlFor="images" className="form-label">{trans.frontend.image || 'Image'}*</label>
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
                                        <option key={index}
                                                value={lang.country_phone_code}>{lang.country_phone_code}</option>
                                    ))}
                                </select>
                                {errors.country_phone_code &&
                                    <div className="invalid-feedback">{errors.country_phone_code[0]}</div>}
                            </div>
                            <div className="col-9" ref={errors.phone ? firstErrorRef : null}>
                                <label htmlFor="phone" className="form-label">{trans.frontend.phone || 'Phone number'}*</label>
                                <input type="tel" id="phone"
                                       className={`form-control ${errors.phone ? 'is-invalid' : ''}`}
                                       placeholder="Telefon nömrəsi"
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
                               placeholder="E-mail"
                               name="email"
                               value={email}
                               onChange={(e) => setEmail(e.target.value)}/>
                        {errors.email && <div className="invalid-feedback">{errors.email[0]}</div>}

                    </div>


                    <div className="col-md-12 mb-4" ref={errors.comment ? firstErrorRef : null}>
                        <label htmlFor="comment" className="form-label">{trans.frontend.additional_information || 'Additional information'}</label>
                        <textarea id="comment"
                                  className={`form-control ${errors.comment ? 'is-invalid' : ''}`}
                                  placeholder="Şərh yazın"
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
            </form>
            <button className="close-form-btn" title={trans.frontend.close || 'Close'} onClick={toggleFormVisibility}>
                <i className="fa fa-times"></i>
            </button>
        </div>
    );
};

export default AnnouncementForm;
