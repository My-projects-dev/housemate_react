import React from 'react';

function Carts({children}) {
    return (
        <>
            <section className="carts">
                <div className="container my-5">
                    <div className="row">
                        <>
                            {children}
                        </>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Carts;
