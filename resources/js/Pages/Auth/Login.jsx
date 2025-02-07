import ApplicationLogo from "@/Components/ApplicationLogo";
import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import Layout from "@/Layouts/Layout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route("login"), {
            onFinish: () => reset("password"),
        });
    };

    return (
        <Layout>
            <Head title="Log in" />

            {status && <div className="mb-4 text-sm font-medium text-green-600">{status}</div>}

            <div className="my-20 max-w-screen-md mx-auto">
                <div className="flex items-center justify-center flex-wrap gap-3 md:gap-6 mb-12">
                    <ApplicationLogo className="w-16 md:w-32 fill-current text-ilyes" />
                    <span className="dark:text-white text-3xl md:text-7xl font-semibold">Webilymedia</span>
                </div>

                <form onSubmit={submit}>
                    <div>
                        <InputLabel htmlFor="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            name="email"
                            value={data.email}
                            className="mt-1 block w-full"
                            autoComplete="username"
                            isFocused={true}
                            onChange={(e) => setData("email", e.target.value)}
                        />

                        <InputError message={errors.email} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            name="password"
                            value={data.password}
                            className="mt-1 block w-full"
                            autoComplete="current-password"
                            onChange={(e) => setData("password", e.target.value)}
                        />

                        <InputError message={errors.password} className="mt-2" />
                    </div>

                    <div className="mt-6 block">
                        <Checkbox
                            label="Remember me"
                            name="remember"
                            checked={data.remember}
                            onChange={(e) => setData("remember", e.target.checked)}
                        />
                    </div>

                    <div className="mt-6 flex items-center justify-end">
                        {/* {canResetPassword && (
                            <Link
                                href={route("password.request")}
                                className="rounded-md text-sm text-slate-600 underline hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Forgot your password?
                            </Link>
                        )} */}

                        <PrimaryButton>
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                "Log In"
                            )}
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </Layout>
    );
}
