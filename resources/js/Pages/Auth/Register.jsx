import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import {Link, router, useForm, usePage} from '@inertiajs/react';
import {useEffect, useState} from "react";

export default function Register() {
    const {trans, language, errors: pageErrors} = usePage().props;
    const [verified, setVerified] = useState(false);
    const [timeLeft, setTimeLeft] = useState(180);
    const {data, setData, post, processing, errors, reset} = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const [verificationCode, setVerificationCode] = useState('');

    useEffect(() => {
        if (verified) {
            const timer = setInterval(() => {
                setTimeLeft(prevTime => prevTime > 0 ? prevTime - 1 : 0);
            }, 1000);
            return () => clearInterval(timer);
        }
    }, [verified]);

    useEffect(() => {
        if (timeLeft === 0) {
            router.get(route('register', [language]));
        }
    }, [timeLeft]);

    const formatTime = (seconds) => {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('register'), {
            onFinish: () => {
                reset('password', 'password_confirmation');
            },
            onError: () => {
                setVerified(false);
            },
            onSuccess: () => {
                setVerified(true);
            },
        });
    };

    // import Swal from 'sweetalert2';

    const handleSubmit = (e) => {
        e.preventDefault();

        router.post(route('verification'), { verificationCode }, {
            onSuccess: () => {
                Swal.fire({
                    title: trans.frontend.messages.success || 'Success',
                    text: trans.frontend.messages.email_verified_successfully || 'Your email has been verified successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then(() => {
                });
            },
            onError: (errors) => {
                Swal.fire({
                    title: trans.frontend.messages.error || 'Error',
                    text: errors.verificationCode || (trans.frontend.messages.error_verifying_email || 'An error occurred while verifying the email.'),
                    icon: 'error',
                    confirmButtonText: trans.frontend.messages.try_again || 'Try Again',
                });
            },
        });
    };


    const handleInputChange = (e) => {
        setVerificationCode(e.target.value);
    };

    return (
        <GuestLayout title={trans.frontend.register || 'Register'}>
            {!verified ? (
                <form onSubmit={submit}>
                    <div>
                        <InputLabel htmlFor="name" value={trans.frontend.name || "Name"}/>

                        <TextInput
                            id="name"
                            name="name"
                            value={data.name}
                            className="mt-1 block w-full form-control"
                            autoComplete="name"
                            isFocused={true}
                            onChange={(e) => setData('name', e.target.value)}
                            required
                        />

                        <InputError message={errors.name} className="mt-2"/>
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="email" value={trans.frontend.email || "Email"}/>

                        <TextInput
                            id="email"
                            type="email"
                            name="email"
                            value={data.email}
                            className="mt-1 block w-full form-control"
                            autoComplete="username"
                            onChange={(e) => setData('email', e.target.value)}
                            required
                        />

                        <InputError message={errors.email} className="mt-2"/>
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password" value={trans.frontend.password || "Password"}/>

                        <TextInput
                            id="password"
                            type="password"
                            name="password"
                            value={data.password}
                            className="mt-1 block w-full form-control"
                            autoComplete="new-password"
                            onChange={(e) => setData('password', e.target.value)}
                            required
                        />

                        <InputError message={errors.password} className="mt-2"/>
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password_confirmation" value={trans.frontend.confirm_password || "Confirm Password"}/>

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            value={data.password_confirmation}
                            className="mt-1 block w-full form-control"
                            autoComplete="new-password"
                            onChange={(e) => setData('password_confirmation', e.target.value)}
                            required
                        />

                        <InputError message={errors.password_confirmation} className="mt-2"/>
                    </div>

                    <div className="flex items-center justify-end mt-4">
                        <Link
                            href={route('login', language)}
                            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {trans.frontend.already_registered || 'Already registered?'}
                        </Link>

                        <PrimaryButton className="ms-4" disabled={processing}>
                            {trans.frontend.register || 'Register'}
                        </PrimaryButton>
                    </div>
                </form>
            ) : (
                <form onSubmit={handleSubmit} className="verification-form">
                    <div className="form-group">
                        <p className="text-center fw-bold">{trans.frontend.verification_email || 'Email Verification'}</p>
                        <p className="text-center">{trans.frontend.enter_number || 'Enter the 6-digit number sent to your email'}</p>

                        <TextInput
                            type="text"
                            id="verificationCode"
                            name="verificationCode"
                            value={verificationCode}
                            onChange={handleInputChange}
                            placeholder="Enter the verification code"
                            required
                            className="form-control"
                        />
                    </div>

                    <PrimaryButton type="submit" className="btn btn-primary mt-3 w-100 d-flex justify-content-center">
                        { trans.frontend.verify_email || 'Verify Email'}
                    </PrimaryButton>

                    <InputError message={pageErrors.verificationCode} className="mt-2"/>

                    <p className="text-center mt-3">
                        {trans.frontend.number_validity_period || 'Number validity period'} <span
                        className="text-danger">{formatTime(timeLeft)}</span>
                    </p>
                </form>
            )}
        </GuestLayout>
    );
}
