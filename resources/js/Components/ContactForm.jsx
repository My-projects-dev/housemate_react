import React, { useState } from 'react';
import axios from 'axios';
import Swal from "sweetalert2";
import {usePage} from "@inertiajs/react";

const ContactForm = () => {
    const {trans} = usePage().props;
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [formData, setFormData] = useState({
        full_name: '',
        email: '',
        subject: '',
        message: '',
    });

    const [errors, setErrors] = useState({});
    const [status, setStatus] = useState('');

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrors({});
        setIsSubmitting(true);

        try {
            const response = await axios.post('/contact/send', formData);

            Swal.fire({
                icon: 'success',
                title: 'Message Sent',
                text: 'Your message has been sent successfully!',
            });
            setFormData({
                full_name: '',
                email: '',
                subject: '',
                message: '',
            });
        } catch (error) {
            if (error.response && error.response.status === 422) {
                setErrors(error.response.data.errors);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to send the message. Please try again.',
                });
                console.log(errors)
            }
        } finally {
            setIsSubmitting(false);
        }
    };

    return (
            <section className="contact-form">
                <h2>Contact Us</h2>

                {status && <p className="text-danger">{status}</p>}

                <form onSubmit={handleSubmit}>
                    <input
                        className={`form-control ${errors.full_name ? 'is-invalid' : ''}`}
                        type="text"
                        name="full_name"
                        placeholder="Full Name"
                        value={formData.full_name}
                        onChange={handleChange}
                        required
                    />
                    {errors.full_name && <p className="invalid-feedback">{errors.full_name[0]}</p>}

                    <input
                        className={`form-control ${errors.email ? 'is-invalid' : ''}`}
                        type="email"
                        name="email"
                        placeholder="Email"
                        value={formData.email}
                        onChange={handleChange}
                        required
                    />
                    {errors.email && <p className="invalid-feedback">{errors.email[0]}</p>}

                    <input
                        className={`form-control ${errors.subject ? 'is-invalid' : ''}`}
                        type="text"
                        name="subject"
                        placeholder="Subject"
                        value={formData.subject}
                        onChange={handleChange}
                        required
                    />
                    {errors.subject && <p className="invalid-feedback">{errors.subject[0]}</p>}

                    <textarea
                        className={`form-control ${errors.message ? 'is-invalid' : ''}`}
                        name="message"
                        placeholder="Message"
                        value={formData.message}
                        onChange={handleChange}
                        required
                    ></textarea>
                    {errors.message && <p className="invalid-feedback">{errors.message[0]}</p>}

                    <button type="submit" className="btn btn-primary border" disabled={isSubmitting}>{isSubmitting ? trans.frontend.sending : trans.frontend.send_message}</button>
                </form>
            </section>
    );
};

export default ContactForm;
