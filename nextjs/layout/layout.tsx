import { NextPage } from "next";
import { ReactElement } from "react";
import SideBar from "../components/SideBar";

type LayoutProps = Required<{
    readonly children: ReactElement
}>

/**
 * レイアウトの切り替え
 * @param props
 * @constructor
 * 参考: https://imatomix.com/imatomix/notes/1591872503000
 */
const Layout: NextPage<LayoutProps> = (props) => {
    return (
        <div className={"flex"}>
            <SideBar />
            <div className={"w-3/4 mx-auto text-center"}>
                {props.children}
            </div>
        </div>
    )
}

export default Layout;
