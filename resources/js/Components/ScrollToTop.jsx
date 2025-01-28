import React, { useEffect, useState } from "react";

function ScrollToTop() {
    const [showScrollTop, setShowScrollTop] = useState(false);

    // Scroll event handler to show/hide the scroll-to-top button
    useEffect(() => {
        const handleScroll = () => {
            setShowScrollTop(window.scrollY > 300);
        };

        window.addEventListener("scroll", handleScroll);

        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, []);

    // Function to scroll to the top
    const scrollToTop = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };

    return (
        showScrollTop && (
            <button
                onClick={scrollToTop}
                className="animate-bounce fixed bottom-10 right-10 bg-ilyes hover:bg-ilyes/80 text-white font-bold rounded-full shadow-lg shadow-ilyes/50 transition duration-300 w-7 aspect-square flex justify-center items-center z-50"
            >
                <i className="fa-solid fa-arrow-up"></i>
            </button>
        )
    );
}

export default ScrollToTop;
