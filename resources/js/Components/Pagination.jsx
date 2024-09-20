import React from 'react';
import { FaAngleDoubleLeft, FaAngleLeft, FaAngleRight, FaAngleDoubleRight } from 'react-icons/fa'; // Font Awesome icons

function Pagination({ currentPage, lastPage, onPageChange }) {
    const handleNextPage = () => {
        if (currentPage < lastPage) {
            onPageChange(currentPage + 1);
        }
    };

    const handlePreviousPage = () => {
        if (currentPage > 1) {
            onPageChange(currentPage - 1);
        }
    };

    const handleFirstPage = () => {
        onPageChange(1);
    };

    const handleLastPage = () => {
        onPageChange(lastPage);
    };

    return (
        <nav className="pagination-wrapper">
            <ul className="pagination justify-content-center mt-4">
                {/* First Button */}
                <li className={`page-item ${currentPage === 1 ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handleFirstPage}>
                        <span className="pagination-text">First</span>
                        <FaAngleDoubleLeft className="pagination-icon" />
                    </button>
                </li>

                {/* Previous Button */}
                <li className={`mx-0 page-item ${currentPage === 1 ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handlePreviousPage}>
                        <span className="pagination-text">Previous</span>
                        <FaAngleLeft className="pagination-icon" />
                    </button>
                </li>

                {/* Page Indicator */}
                <li className="page-item disabled">
                    <span className="page-link">{currentPage} / {lastPage}</span>
                </li>

                {/* Next Button */}
                <li className={`mx-0 page-item ${currentPage === lastPage ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handleNextPage}>
                        <span className="pagination-text">Next</span>
                        <FaAngleRight className="pagination-icon" />
                    </button>
                </li>

                {/* Last Button */}
                <li className={`page-item ${currentPage === lastPage ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={handleLastPage}>
                        <span className="pagination-text">Last</span>
                        <FaAngleDoubleRight className="pagination-icon" />
                    </button>
                </li>
            </ul>
        </nav>
    );
}

export default Pagination;
