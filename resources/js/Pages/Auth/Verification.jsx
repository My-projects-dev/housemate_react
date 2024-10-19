import GuestLayout from '@/Layouts/GuestLayout';
import { usePage, router } from '@inertiajs/react'; // Import Inertia's router for redirection
import { useState, useEffect } from 'react';

export default function Verification({ status, canResetPassword }) {
    const { trans, language } = usePage().props;
    const [timeLeft, setTimeLeft] = useState(180);


    useEffect(() => {
        const timer = setInterval(() => {
            setTimeLeft(prevTime => prevTime > 0 ? prevTime - 1 : 0);
        }, 1000);

        // Cleanup the interval when the component is unmounted
        return () => clearInterval(timer);
    }, []);


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


    return (
        <GuestLayout title={trans.frontend.verified || 'Verified'}>
            <p className="text-center fw-bold">{trans.frontend.verification_email || 'Email Verification'}</p>
            <p className="text-center">{trans.frontend.enter_number || 'Enter the 6-digit number sent to your email'}</p>
            <input type="text" className="form-control" />
            <p className="text-center mt-3">
                {trans.frontend.number_validity_period || 'Number validity period'} <span className="text-danger">{formatTime(timeLeft)}</span>
            </p>
        </GuestLayout>
    );
}
