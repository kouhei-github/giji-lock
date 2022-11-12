import { NextPage } from "next";
import { ReactElement } from "react";

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
        <div className={"bg-black text-white"}>
            {props.children}
        </div>
    )
}

export default Layout;
