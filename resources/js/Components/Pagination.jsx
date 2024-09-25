import React from 'react';
import { FaAngleDoubleLeft, FaAngleLeft, FaAngleRight, FaAngleDoubleRight } from 'react-icons/fa';
import {router, usePage} from '@inertiajs/react';

const PaginationSecond = ({ meta }) => {
    const {trans} = usePage().props;
    const { current_page, last_page, links } = meta;

    const handlePageChange = (page) => {
        if (page) {
            router.visit(`${meta.path}?page=${page}`);
        }
    };

    const handleFirstPage = () => handlePageChange(1);
    const handlePreviousPage = () => handlePageChange(current_page - 1);
    const handleNextPage = () => handlePageChange(current_page + 1);
    const handleLastPage = () => handlePageChange(last_page);

    // Only show pagination if there is more than 1 page
    if (last_page <= 1) {
        return null; // Don't render the pagination component
    }

    return (
        <nav className="pagination-wrapper">
            <ul className="pagination justify-content-center mt-4">
                {/* First Button */}
                <li className={`page-item ${current_page === 1 ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handleFirstPage}>
                        <span className="pagination-text">{trans.pagination.first || 'First'}</span>
                        <FaAngleDoubleLeft className="pagination-icon" />
                    </button>
                </li>

                {/* Previous Button */}
                <li className={`mx-0 page-item ${current_page === 1 ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handlePreviousPage}>
                        <span className="pagination-text">{trans.pagination.previous || 'Previous'}</span>
                        <FaAngleLeft className="pagination-icon" />
                    </button>
                </li>

                {/* Page Indicator */}
                <li className="page-item disabled">
                    <span className="page-link">{current_page} / {last_page}</span>
                </li>

                {/* Next Button */}
                <li className={`mx-0 page-item ${current_page === last_page ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handleNextPage}>
                        <span className="pagination-text">{trans.pagination.next || 'Next'}</span>
                        <FaAngleRight className="pagination-icon" />
                    </button>
                </li>

                {/* Last Button */}
                <li className={`page-item ${current_page === last_page ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handleLastPage}>
                        <span className="pagination-text">{trans.pagination.last || 'Last'}</span>
                        <FaAngleDoubleRight className="pagination-icon" />
                    </button>
                </li>
            </ul>
        </nav>
    );
};

export default PaginationSecond;
