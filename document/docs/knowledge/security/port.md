# ポート

同じ機器（一つの IP アドレス）で複数の異なるアプリケーションが同時に通信したり、異なる通信相手と同時に通信できるよう、データの送受信の窓口となる**ポート**が存在する。ポートは 0 から 65535 まで存在し、これを**ポート番号**という。
その中で、WEB サーバーは**80**または**443**番ポートを用いている。

!!! note

    ウェルノウンポート
    ウェルノウンポートとは、TCP/IPによる通信で利用されるTCPやUDPのポート番号のうち、著名なサービスやプロトコルが利用するために予約されている0番から1023番のこと。

    WEBアプリケーションのHTTPの80番ポートもウェルノウンポートである。次に解説する、SSHの22番ポートもウェルノウンポートである。
