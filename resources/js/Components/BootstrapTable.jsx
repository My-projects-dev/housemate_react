import React, { useState } from 'react';
import { Table, Pagination } from 'react-bootstrap';
import { FaEdit, FaTrash } from "react-icons/fa";
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

function BootstrapTable({ data, trans }) {
    const [currentPage, setCurrentPage] = useState(1);
    const [tableData, setTableData] = useState(data);
    const itemsPerPage = 10;

    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    const currentData = tableData.slice(indexOfFirstItem, indexOfLastItem);

    const handlePageChange = (pageNumber) => setCurrentPage(pageNumber);

    // Status dəyişdirmək funksiyası
    const toggleStatus = async (id) => {
        try {
            const response = await fetch(`/announcement/status/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            if (response.ok) {
                setTableData((prevData) =>
                    prevData.map((item) =>
                        item.id === id ? { ...item, status: item.status === '1' ? '0' : '1' } : item
                    )
                );

                toast.success(trans.messages.status_changed || 'Status successfully changed!');
            } else {
                toast.error(trans.messages.failed_change_status || 'Failed to change status.');
            }
        } catch (error) {
            console.error('Status not changed:', error);
            toast.error(trans.messages.an_error || 'An error occurred.');
        }
    };

    // Silmə funksiyası
    const deleteAnnouncement = async (id) => {
        if (window.confirm(trans.messages.sure_delete || "Are you sure you want to delete this announcement?")) {
            try {
                const response = await fetch(`/announcement/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                if (response.ok) {
                    // Məlumatları yenilə
                    setTableData((prevData) => prevData.filter((item) => item.id !== id));
                    toast.success(trans.messages.announcement_delete_successfully || 'Announcement deleted successfully!');
                } else {
                    toast.error(trans.messages.announcement_failed_delete || 'Failed to delete announcement.');
                }
            } catch (error) {
                console.error('Error during delete operation:', error);
                toast.error(trans.messages.an_error || 'An error occurred.');
            }
        }
    };

    const totalPages = Math.ceil(tableData.length / itemsPerPage);
    const pageNumbers = [];

    const maxVisiblePages = 5;
    const startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
    const endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

    for (let i = startPage; i <= endPage; i++) {
        pageNumbers.push(i);
    }

    return (
        <div>
            <Table striped bordered hover>
                <thead>
                <tr>
                    <th className="table-index">#</th>
                    <th>{trans.image || 'Image'}</th>
                    <th>{trans.title || 'Title'}</th>
                    <th>{trans.status || 'Status'}</th>
                    <th>{trans.actions || 'Actions'}</th>
                </tr>
                </thead>
                <tbody>
                {currentData.map((item, index) => (
                    <tr key={item.id}>
                        <td className="table-index">{indexOfFirstItem + index + 1}</td>
                        <td>
                            {item.images.length > 0 && item.images[0].image ?
                            <img src={`/uploads/announcements/${item.images[0].image}`}
                                alt={item.title}
                                width="100px"
                            /> : ''
                        }
                        </td>
                        <td>{item.title || ''}</td>
                        <td>
                            <button
                                className={`btn btn-sm ${item.status === '1' ? 'btn-success' : 'btn-danger'}`}
                                onClick={() => toggleStatus(item.id)}
                            >
                                {item.status === '1' ? trans.active || 'Active' : trans.passive || 'Passive'}
                            </button>
                        </td>
                        <td>
                            <button className="btn btn-warning mr-2 mb-2"><FaEdit /></button>
                            <button className="btn btn-danger" onClick={() => deleteAnnouncement(item.id)}><FaTrash /></button>
                        </td>
                    </tr>
                ))}
                </tbody>
            </Table>
            <div className="d-flex justify-content-center">
                <Pagination>
                    {pageNumbers.map((number) => (
                        <Pagination.Item
                            key={number}
                            active={number === currentPage}
                            onClick={() => handlePageChange(number)}
                        >
                            {number}
                        </Pagination.Item>
                    ))}
                </Pagination>
            </div>
            <ToastContainer />
        </div>
    );
}

export default BootstrapTable;
