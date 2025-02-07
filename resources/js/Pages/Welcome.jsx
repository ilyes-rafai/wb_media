import Layout from "@/Layouts/Layout";
import { Head, Link } from "@inertiajs/react";
import CallToAction from "./Guest/Components/CallToAction";
import Spacer from "./Guest/Components/Spacer";
import FAQ from "./Guest/Sections/FAQ";
import Hero from "./Guest/Sections/Hero";
import Pricing from "./Guest/Sections/Pricing";
import Topics from "./Guest/Sections/Topics";
import Word from "./Guest/Sections/Word";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <Layout>
            <Head title="Welcome" />

            <Hero />
            <Spacer />

            <Topics />

            <Spacer />
            <CallToAction />

            <Spacer />

            <Pricing />
            <Spacer />

            <Word />
            <Spacer />

            <FAQ />
            <Spacer />
        </Layout>
    );
}
